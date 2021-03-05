<?php
declare(strict_types=1);

namespace App\Application\Actions\Donor;

use Psr\Http\Message\ResponseInterface as Response;
use App\Application\Actions\Donor\DonorAction;

class ListDonorsAction extends DonorAction {
    /**
     * {@inheritdoc}
     */
    protected function action(): Response {

        $query = $this->request->getQueryParams();

        $page = $query['page'];
        $limit = $query['limit'];

        return $this->respondWithData($this->donorController->list($page, $limit));
    }
}
