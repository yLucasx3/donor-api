<?php
declare(strict_types=1);

namespace App\Application\Actions\Donor;

use App\Application\Actions\Action;
use App\Application\Controller\DonorController;

abstract class DonorAction extends Action {

    protected $donorController;

    public function __construct() {
        $this->donorController = new DonorController();
    }
}
