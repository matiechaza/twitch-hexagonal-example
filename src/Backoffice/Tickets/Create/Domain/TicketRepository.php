<?php

declare(strict_types=1);

namespace Src\Backoffice\Tickets\Create\Domain;

use Src\Backoffice\Tickets\Create\Application\TicketMapper;

interface TicketRepository
{
    public function create(TicketMapper $ticket);
}
