<?php
declare(strict_types=1);

namespace App\Application\Actions\Payment;

use Psr\Http\Message\ResponseInterface as Response;
use App\Application\Actions\Payment\PaymentAction;

class ListPaymentsAction extends PaymentAction {
    /**
     * {@inheritdoc}
     */

    protected function action(): Response {

        $query = $this->request->getQueryParams();

        $page = $query['page'];
        $limit = $query['limit'];

        return $this->respondWithData($this->paymentController->list($page, $limit));
    }
}
