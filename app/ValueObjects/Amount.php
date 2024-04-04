<?php

namespace App\ValueObjects;

use App\Interfaces\ValueObject;

/**
 * A value object is a _reusable class_ that encapsulates non-business logic.
 * Its responsibility is to represent a meaningful characteristic and ensure the correctness and relevance of its value.
 */
class Amount implements ValueObject
{
    private int $value;

    public function __construct(int $value)
    {
        $this->guard($value);

        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    /**
     * Value object must guarantee its reliability.
     */
    private function guard(int $value): void
    {
        if ($value <= 0) {
            throw new \Exception('amount cannot be negative');
        }
    }
}