<?php
declare(strict_types=1);

namespace App\Application\Actions\Payment;

use Psr\Http\Message\ResponseInterface as Response;
use App\Application\Actions\Payment\PaymentAction;

class ShowPaymentAction extends PaymentAction {
    /**
     * {@inheritdoc}
     */

    protected function action(): Response {

        $id = $this->request->getAttribute("id");

        return $this->respondWithData($this->paymentController->show($id));
    }
}
