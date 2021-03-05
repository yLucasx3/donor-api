<?php
declare(strict_types=1);

namespace App\Application\Actions\Donation;

use App\Application\Actions\Action;
use App\Application\Controller\DonationController;

abstract class DonationAction extends Action {

    protected $donationController;

    public function __construct() {
        $this->donationController = new DonationController();
    }
}
