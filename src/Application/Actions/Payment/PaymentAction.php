<?php
declare(strict_types=1);

namespace App\Application\Actions\Payment;

use App\Application\Actions\Action;
use App\Application\Controller\PaymentController;

abstract class PaymentAction extends Action {

    protected $paymentController;

    public function __construct() {
        $this->paymentController = new PaymentController();
    }
}
