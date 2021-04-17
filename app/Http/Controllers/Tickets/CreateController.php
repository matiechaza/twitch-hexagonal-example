<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tickets;

use App\Http\Controllers\MyBaseController;
use App\Http\Requests\CreateTicketRequest;
use Src\Backoffice\Tickets\Create\Application\ArrayTicketMapper;
use Src\Backoffice\Tickets\Create\Application\Creater;
use Src\Backoffice\Tickets\Create\Application\DataToCreate;
use Src\Backoffice\Tickets\Create\Infrastructure\EloquentTicketRepository;

final class CreateController extends MyBaseController
{
    public function __invoke(CreateTicketRequest $request, $event_id)
    {
        $repository = new EloquentTicketRepository();
        $mapper = new ArrayTicketMapper();
        $creater = new Creater($repository, $mapper);

        try {
            $creater->execute(
                DataToCreate::fromRequest($request)
            );
        } catch (\Exception $exception) {
            return back();
        }

        return response()->json([
            'status'      => 'success',
            'id'          => $ticket->id,
            'message'     => trans("Controllers.refreshing"),
            'redirectUrl' => route('showEventTickets', [
                'event_id' => $event_id,
            ]),
        ]);
    }
}
