<?php

namespace App\ValueObjects;

use App\Interfaces\ValueObject;

/**
 * A value object is a _reusable class_ that encapsulates non-business logic.
 * Its responsibility is to represent a characteristic and to guarantee the correctness of its value.
 */
class Name implements ValueObject
{
    private string $value;

    public function __construct(string $value)
    {
        $this->guard($value);

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    /**
     * Value object must guarantee its reliability.
     */
    private function guard(string $value): void
    {
        // check that the name is valid
    }
}
