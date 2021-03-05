<?php

namespace App\Application\Controller;

use App\Application\DAO\DonationDAO;

class DonationController {

    private $donationDAO;

    function __construct() {

        $this->donationDAO = new DonationDAO();
    }

    function show($id) {

        return $this->donationDAO->show($id);
    }

    function list($page, $limit) {
        return $this->donationDAO->list($page, $limit);
    }
    
    function create($donation) {

        return $this->donationDAO->create($donation);
    }

    function update($payment) {

        return $this->donationDAO->update($payment);
    }

    function delete($id) {

        return $this->donationDAO->delete($id);
    }
}