<?php
declare(strict_types=1);

namespace App\Application\Actions\Payment;

use Psr\Http\Message\ResponseInterface as Response;
use App\Application\Actions\Payment\PaymentAction;
use App\Application\Model\Payment;

class UpdatePaymentAction extends PaymentAction {
    /**
     * {@inheritdoc}
     */

    protected function action(): Response {

        $body = $this->request->getParsedBody();
        $id = $this->request->getAttribute("id");

        $payment = new Payment();

        $payment->setId($id);
        $payment->setStatus($body['status']);
        $payment->setAmount($body['amount']);
        $payment->setPaymentType($body['payment_type']);
        $payment->setDonationId($body['donation_id']);

        return $this->respondWithData($this->paymentController->update($payment));
    }
}
