<?php
declare(strict_types=1);

namespace App\Application\Actions\Donation;

use Psr\Http\Message\ResponseInterface as Response;
use App\Application\Actions\Donation\DonationAction;

class ListDonationsAction extends DonationAction {
    /**
     * {@inheritdoc}
     */

    protected function action(): Response {

        $query = $this->request->getQueryParams();

        $page = $query['page'];
        $limit = $query['limit'];

        return $this->respondWithData($this->donationController->list($page, $limit));
    }
}
