<?php
declare(strict_types=1);

namespace App\Application\Actions\Donation;

use Psr\Http\Message\ResponseInterface as Response;
use App\Application\Actions\Donation\DonationAction;
use App\Application\Model\Donation;

class UpdateDonationAction extends DonationAction {
    /**
     * {@inheritdoc}
     */

    protected function action(): Response {

        $body = $this->request->getParsedBody();
        $id = $this->request->getAttribute("id");

        $donation = new Donation();

        $donation->setId($id);
        $donation->setAmount($body['amount']);
        $donation->setDonorId($body['donor_id']);
        $donation->setCreatedAt($body['created_at']);
        $donation->setDescription($body['description']);

        return $this->respondWithData($this->donationController->update($donation));
    }
}
