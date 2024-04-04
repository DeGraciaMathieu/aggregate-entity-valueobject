<?php

namespace App\Aggregates;

use App\Entities\Transaction;
use App\Interfaces\Aggregate;

/**
 * An aggregate represents a business concept (ex: budget).
 * It is responsible for containing and ensuring the reliability of the entities it contains (ex: transactions).
 * It can also provide entry points to manipulate and interact with its entities (ex: retrieve the amount of transactions).
 */
class Budget implements Aggregate
{
    private array $transactions = [];

    public function addTransaction(Transaction $transaction): void
    {
        /**
         * Aggregate verifies here a business rule which consists of not having duplicate transactions within a budget.
         */
        $this->isNotDuplicatedTransaction($transaction);

        $this->transactions[] = $transaction;
    }

    /**
     * An aggregate facilitates the manipulation of the entities it contains.
     * Such as retrieving the total amount of all its transactions.
     */
    public function amount(): int
    {
        $budgetAmount = 0;

        array_map(function (Transaction $transaction) use (&$budgetAmount) {
            $budgetAmount += $transaction->amountDue();
        }, $this->transactions);

        return $budgetAmount;
    }

    private function isNotDuplicatedTransaction(Transaction $addedTransaction): void
    {
        $duplicates = array_filter($this->transactions, function ($transaction) use ($addedTransaction) {
            return $transaction->is($addedTransaction);
        });

        if ($duplicates) {
            throw new \Exception('transaction is already in this budget');
        }
    }
}