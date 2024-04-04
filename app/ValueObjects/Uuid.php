<?php

namespace App\ValueObjects;

use App\Interfaces\ValueObject;

/**
 * A value object is a _reusable class_ that encapsulates non-business logic.
 * Its responsibility is to represent a characteristic and to guarantee the correctness of its value.
 */
class Uuid implements ValueObject
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;

        $this->guard();
    }

    public function value(): string
    {
        return $this->value;
    }

    public function is(Uuid $uuid)
    {
        return $this->value === $uuid->value();
    }

    /**
     * Value object must guarantee its reliability.
     */
    private function guard(): void
    {
        // check that the uuid is valid
    }
}