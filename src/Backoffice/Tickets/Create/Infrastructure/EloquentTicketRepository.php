<?php

declare(strict_types=1);

namespace Src\Backoffice\Tickets\Create\Infrastructure;

use App\Models\Ticket;
use Src\Backoffice\Tickets\Create\Application\TicketMapper;
use Src\Backoffice\Tickets\Create\Domain\TicketRepository;

final class EloquentTicketRepository implements TicketRepository
{
    /** @var Ticket */
    private $ticket;

    public function __construct()
    {
        $this->ticket = new Ticket();
    }

    public function create(TicketMapper $ticket)
    {
        $this->ticket->create(
            $ticket->load()
        );
    }
}
