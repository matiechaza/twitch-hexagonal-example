<?php

declare(strict_types=1);

namespace Src\Backoffice\Tickets\Create\Domain;

final class Money
{
    /** @var float */
    private $amount;

    /** @var CurrencyValueObject */
    private $currency;

    public function __construct(float $amount, CurrencyValueObject $currency)
    {
        $this->setAmount($amount);
        $this->currency = $currency;
    }

    private function setAmount(float $amount): void
    {
        if ($amount < 0) {
            throw new AmountInvalid();
        }

        $this->amount = number_format($amount, 2);
    }

    public function amount(): float
    {
        return $this->amount;
    }

    public function currency(): string
    {
        return $this->currency->value();
    }

    public function __toString(): string
    {
        return $this->amount() . ' ' . $this->currency();
    }
}
