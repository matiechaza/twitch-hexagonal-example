<?php

declare(strict_types=1);

namespace Src\Backoffice\Tickets\Create\Domain;

final class TicketEntity
{
    /** @var Title */
    private $title;
    /** @var Money */
    private $price;
    private $description;
    private $startSaleDate;
    private $endSaleDate;
    private $quantityAvailable;

    public function __construct(
        Title $title,
        Money $price,
        $description,
        $startSaleDate,
        $endSaleDate,
        $quantityAvailable
    )
    {
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
        $this->startSaleDate = $startSaleDate;
        $this->endSaleDate = $endSaleDate;
        $this->quantityAvailable = $quantityAvailable;
    }

    public function title(): Title
    {
        return $this->title;
    }

    public function price(): Money
    {
        return $this->price;
    }

    public function description()
    {
        return $this->description;
    }

    public function startSaleDate()
    {
        return $this->startSaleDate;
    }

    public function endSaleDate()
    {
        return $this->endSaleDate;
    }

    public function quantityAvailable()
    {
        return $this->quantityAvailable;
    }
}
