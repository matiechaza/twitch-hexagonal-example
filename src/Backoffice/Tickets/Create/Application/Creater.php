<?php

declare(strict_types=1);

namespace Src\Backoffice\Tickets\Create\Application;

use Src\Backoffice\Tickets\Create\Domain\CurrencyValueObject;
use Src\Backoffice\Tickets\Create\Domain\Money;
use Src\Backoffice\Tickets\Create\Domain\TicketEntity as Ticket;
use Src\Backoffice\Tickets\Create\Domain\TicketRepository;
use Src\Backoffice\Tickets\Create\Domain\Title;

final class Creater
{
    /** @var TicketRepository */
    private $repository;
    /** @var TicketMapper */
    private $mapper;

    public function __construct(TicketRepository $repository, TicketMapper $mapper)
    {
        $this->repository = $repository;
        $this->mapper = $mapper;
    }

    public function execute(DataToCreate $dataToCreate) : void
    {
        $ticket = new Ticket(
            new Title($dataToCreate->title()),
            new Money($dataToCreate->price(), new CurrencyValueObject()),
            $dataToCreate->description(),
            $dataToCreate->startSaleDate(),
            $dataToCreate->endSaleDate(),
            $dataToCreate->quantityAvailable()
        );

        $this->mapper->map(
            $ticket->title()->value(),
            $ticket->description(),
        );

        $this->repository->create($this->mapper);
    }
}
