<?php

declare(strict_types=1);

namespace Src\Backoffice\Tickets\Create\Domain;

final class Title
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
