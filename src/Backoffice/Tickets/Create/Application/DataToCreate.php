<?php

declare(strict_types=1);

namespace Src\Backoffice\Tickets\Create\Application;

use App\Http\Requests\CreateTicketRequest;

final class DataToCreate
{
    /** @var string */
    private $title;
    /** @var float */
    private $price;
    private $description;
    private $startSaleDate;
    private $endSaleDate;
    private $quantityAvailable;
    /** @var int */
    private $minPerPerson;
    /** @var int */
    private $maxPerPerson;
    /** @var bool */
    private $isHidden;

    private function __construct(
        string $title,
        float $price,
        $description,
        $startSaleDate,
        $endSaleDate,
        $quantityAvailable,
        int $minPerPerson,
        int $maxPerPerson,
        bool $isHidden
    )
    {
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
        $this->startSaleDate = $startSaleDate;
        $this->endSaleDate = $endSaleDate;
        $this->quantityAvailable = $quantityAvailable;
        $this->minPerPerson = $minPerPerson;
        $this->maxPerPerson = $maxPerPerson;
        $this->isHidden = $isHidden;
    }

    public static function fromRequest(CreateTicketRequest $request): self
    {
        return new self(
            $request->input('title'),
            $request->input('price'),
            $request->input('description'),
            $request->input('start_sale_date'),
            $request->input('end_sale_date'),
            $request->input('quantity_available'),
            $request->input('min_per_person'),
            $request->input('max_per_person'),
            (bool) $request->input('is_hidden')
        );
    }

    public function title(): string
    {
        return $this->title;
    }

    public function price(): float
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

    public function minPerPerson(): int
    {
        return $this->minPerPerson;
    }

    public function maxPerPerson(): int
    {
        return $this->maxPerPerson;
    }

    public function isHidden(): bool
    {
        return $this->isHidden;
    }
}
