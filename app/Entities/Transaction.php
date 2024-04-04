<?php

namespace App\Entities;

use App\Interfaces\Entity;
use App\ValueObjects\Name;
use App\ValueObjects\Uuid;
use App\ValueObjects\Amount;

/**
 * An entity represents a business concept, similar to aggregates, but on a smaller and individual scale.
 */
class Transaction implements Entity
{
    /**
     * The values of an entity are always value objects to protect against primitive obsession.
     */
    public function __construct(
        private Uuid $uuid,
        private Name $name,
        private Amount $amount,
    ) {}

    public function is(Transaction $transaction): bool
    {
        return $this->uuid->is($transaction->uuid());
    }

    public function uuid(): Uuid
    {
        return $this->uuid;
    }

    /**
     * An entity has methods to manipulate its value objects.
     * These intermediary methods are essential to avoid exposing the internal structure of 
     * the object and to respect the Law of Demeter.
     */
    public function amountDue(): float
    {
        return $this->amount->value();
    }

    public function name(): Name
    {
        return $this->name;
    }
}