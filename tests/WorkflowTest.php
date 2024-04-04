<?php

use App\Aggregates\Budget;
use App\ValueObjects\Name;
use App\ValueObjects\Uuid;
use App\ValueObjects\Amount;
use App\Entities\Transaction;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

final class WorkflowTest extends TestCase
{
    #[Test]
    public function it_works_well(): void
    {
        $budget = new Budget();

        $budget->addTransaction(
            new Transaction(
                new Uuid('3a535f13-a832-49c1-9156-4dd67744c197'),
                new Name(''),
                new Amount(10),
            ),
        );

        $budget->addTransaction(
            new Transaction(
                new Uuid('a086e8a5-e016-4f84-b888-c918a70809e6'),
                new Name(''),
                new Amount(30),
            ),
        );

        $this->assertSame(40, $budget->amount());
    }
}