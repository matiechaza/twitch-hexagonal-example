<?php

declare(strict_types=1);

namespace Src\Backoffice\Tickets\Create\Application;

interface TicketMapper
{
    public function map(string $title, string $description);

    public function load();
}
