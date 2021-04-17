<?php

declare(strict_types=1);

namespace Src\Backoffice\Tickets\Create\Application;

final class ArrayTicketMapper implements TicketMapper
{
    /** @var string */
    private $title;

    /** @var string */
    private $description;

    public function map(string $title, string $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function load()
    {
        return [
            'title' => $this->title,
            'description' => $this->description
        ];
    }
}
