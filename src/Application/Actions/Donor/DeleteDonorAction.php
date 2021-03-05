<?php
declare(strict_types=1);

namespace App\Application\Actions\Donor;

use Psr\Http\Message\ResponseInterface as Response;
use App\Application\Actions\Donor\DonorAction;

class DeleteDonorAction extends DonorAction {
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        
        $id = $this->request->getAttribute("id");
        
        return $this->respondWithData($this->donorController->delete($id));
    }
}
