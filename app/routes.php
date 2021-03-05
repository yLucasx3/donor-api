<?php
declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

use App\Application\Actions\Donor\ListDonorsAction;
use App\Application\Actions\Donor\ShowDonorAction;
use App\Application\Actions\Donor\CreateDonorAction;
use App\Application\Actions\Donor\UpdateDonorAction;
use App\Application\Actions\Donor\DeleteDonorAction;

use App\Application\Actions\Donation\ListDonationsAction;
use App\Application\Actions\Donation\ShowDonationAction;
use App\Application\Actions\Donation\CreateDonationAction;
use App\Application\Actions\Donation\UpdateDonationAction;
use App\Application\Actions\Donation\DeleteDonationAction;

use App\Application\Actions\Payment\ListPaymentsAction;
use App\Application\Actions\Payment\ShowPaymentAction;
use App\Application\Actions\Payment\CreatePaymentAction;
use App\Application\Actions\Payment\UpdatePaymentAction;
use App\Application\Actions\Payment\DeletePaymentAction;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {

        return $response;
    });

    $app->get('/', function (Request $request, Response $response, $args) {

        $response->getBody()->write('Welcome to Donors API.');
        return $response;
    });

    $app->group('/donors', function (Group $group) {

        $group->get('', ListDonorsAction::class);

        $group->get('/{id}', ShowDonorAction::class);
        
        $group->post('', CreateDonorAction::class);
        
        $group->put('/{id}', UpdateDonorAction::class);

        $group->delete('/{id}', DeleteDonorAction::class);
    });

    $app->group('/donations', function (Group $group) {

        $group->get('', ListDonationsAction::class);

        $group->get('/{id}', ShowDonationAction::class);

        $group->post('', CreateDonationAction::class);

        $group->put('/{id}', UpdateDonationAction::class);

        $group->delete('/{id}', DeleteDonationAction::class);
    });

    $app->group('/payments', function (Group $group) {

        $group->get('', ListPaymentsAction::class);

        $group->get('/{id}', ShowPaymentAction::class);

        $group->post('', CreatePaymentAction::class);

        $group->put('/{id}', UpdatePaymentAction::class);

        $group->delete('/{id}', DeletePaymentAction::class);
    });
};
