<?php
declare(strict_types=1);

namespace App\Application\Actions\Donation;

use Psr\Http\Message\ResponseInterface as Response;
use App\Application\Actions\Donation\DonationAction;

class ShowDonationAction extends DonationAction {
    /**
     * {@inheritdoc}
     */
    protected function action(): Response {
        
        $id = $this->request->getAttribute("id");
        
        return $this->respondWithData($this->donationController->show($id));
    }
}
