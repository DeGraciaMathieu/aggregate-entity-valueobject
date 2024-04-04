# aggregate-entity-valueobject
Small exercise to differentiate the concepts of aggregate, entity, and value object in PHP.

## Architecture
![qsdsqdqs](https://github.com/DeGraciaMathieu/aggregate-entity-valueobject/assets/11473997/fc574cb0-b855-4d20-a221-05cc9d408a40)

### Aggregate
An aggregate represents a business concept (ex: budget).
It is responsible for containing and ensuring the reliability of the entities it contains (ex: transactions).
It can also provide entry points to manipulate and interact with its entities (ex: retrieve the amount of transactions).

### Entity
An entity represents a business concept, similar to aggregates, but on a smaller and individual scale.
The values of an entity are always value objects to protect against primitive obsession. (ex: Name, Amount ...)
An entity has methods to manipulate its properties, these intermediary methods are essential to avoid exposing the internal structure of the object and to respect the Law of Demeter.

### Value object
A value object is a reusable class that encapsulates non-business logic.
Its responsibility is to represent a meaningful characteristic and ensure the correctness and relevance of its value. 

## usage
```php
$budget = new App\Aggregators\Budget();

$budget->addTransaction(
    new App\Entities\Transaction(
        new App\ValuesObjects\Uuid('3a535f13-a832-49c1-9156-4dd67744c197'),
        new App\ValuesObjects\Name(''),
        new App\ValuesObjects\Amount(10),
    ),
);

$budget->addTransaction(
    new App\Entities\Transaction(
        new App\ValuesObjects\Uuid('a086e8a5-e016-4f84-b888-c918a70809e6'),
        new App\ValuesObjects\Name(''),
        new App\ValuesObjects\Amount(30),
    ),
);

$budget->amount();
```
