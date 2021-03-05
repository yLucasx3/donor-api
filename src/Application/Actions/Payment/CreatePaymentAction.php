<?php
declare(strict_types=1);

namespace App\Application\Actions\Payment;

use Psr\Http\Message\ResponseInterface as Response;
use App\Application\Actions\Payment\PaymentAction;
use App\Application\Model\Payment;

class CreatePaymentAction extends PaymentAction {
    /**
     * {@inheritdoc}
     */

    protected function action(): Response {

        $body = $this->request->getParsedBody();

        $payment = new Payment();

        $payment->setStatus($body['status']);
        $payment->setAmount($body['amount']);
        $payment->setPaymentType($body['payment_type']);
        $payment->setDonationId($body['donation_id']);

        return $this->respondWithData($this->paymentController->create($payment));
    }
}
