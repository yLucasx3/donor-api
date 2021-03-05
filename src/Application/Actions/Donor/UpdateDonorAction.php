<?php
declare(strict_types=1);

namespace App\Application\Actions\Donor;

use Psr\Http\Message\ResponseInterface as Response;
use App\Application\Actions\Donor\DonorAction;
use App\Application\Model\Donor;

class UpdateDonorAction extends DonorAction {
    /**
     * {@inheritdoc}
     */
    protected function action(): Response {
        
        
        $body = $this->request->getParsedBody();
        $id = $this->request->getAttribute('id');
        
        $donor = new Donor();

        $donor->setId($id);
        $donor->setName($body['name']);
        $donor->setEmail($body['email']);
        $donor->setCpf($body['cpf']);
        $donor->setBirthDate($body['birth_date']);
        $donor->setDonationInterval($body['donation_interval']);
        $donor->setPhoneNumber($body['phone_number']);
        $donor->setPublicPlace($body['public_place']);
        $donor->setNumber($body['number']);
        $donor->setZipCode($body['zip_code']);
        $donor->setComplement($body['complement']);
        $donor->setCity($body['city']);
        $donor->setState($body['state']);
        $donor->setCreatedAt($body['created_at']);
        
        return $this->respondWithData($this->donorController->update($donor));
    }
}
