<?php

declare(strict_types=1);

namespace Src\Backoffice\Tickets\Create\Domain;

final class CurrencyValueObject
{
    const USD = 'USD';

    /** @var string */
    private $value;

    public function __construct(string $value = 'USD')
    {
        $this->setValue($value);
    }

    /**
     * @param string $value
     */
    private function setValue(string $value): void
    {
        if ($value !== self::USD) {
            throw new CurrencyInvalid();
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
