<?php

namespace App\Application\Controller;

use App\Application\DAO\PaymentDAO;

class PaymentController {

    private $paymentDAO;

    function __construct() {

        $this->paymentDAO = new PaymentDAO();
    }

    function show($id) {

        return $this->paymentDAO->show($id);
    }

    function list($page, $limit) {
        return $this->paymentDAO->list($page, $limit);
    }
    
    function create($payment) {

        return $this->paymentDAO->create($payment);
    }

    function update($payment) {

        return $this->paymentDAO->update($payment);
    }

    function delete($id) {

        return $this->paymentDAO->delete($id);
    }
}