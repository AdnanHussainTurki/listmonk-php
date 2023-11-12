# ListMonk - PHP
The package allows easy access to ListMonk API from PHP based applications.


### Installation
You can install this library to your project via composer using the following command:

`composer require adnanhussainturki/listmonk-php`

### Usage


```php
<?php

require __DIR__ . 'vendor/autoload.php';

// Create a new ListMonk instance
$listMonk = new \AdnanHussainTurki\ListMonk\ListMonk(
    "http://localhost:9000", // Server URL
    "listmonk", // Username
    "listmonk", // Password
);

?>
```
    
###    Managing lists
```php
    
// Get all lists
$lists = $listMonk->lists()->getAll();
echo "All lists:\n";
foreach ($lists as $list) {
    echo $list->getId() . " - " . $list->getName() . "\n";
}

// Get a list by id
$list = $listMonk->lists()->get(3);
echo "List with id 3:\n";
echo $list->getId() . " - " . $list->getName() . "\n";

// Create a new list
$newList = new \AdnanHussainTurki\ListMonk\Models\MonkList();
$newList->setName("Test List");
$newList->setType("private");
$newList->setOptin("single");
$newList->setTags(["test", "list"]);
$newListMonk = $listMonk->lists()->create($newList);
echo "New list created:\n";
echo $newListMonk->getId(). " - " . $newListMonk->getName() . "\n";


// Update the created list
$newListMonk->setName("Test List Updated");
$newListMonk->setType("public");
$newListMonk->setOptin("double");
$newListMonk->setTags(["test", "list", "updated"]);
$updatedList = $listMonk->lists()->update($newListMonk);
echo "Updated list:\n";
echo $updatedList->getId(). " - " . $updatedList->getName() . "\n";


// Delete the created list
$deletedList = $listMonk->lists()->delete($updatedList->getId());
echo "List deleted:\n";
echo $deletedList->getId(). " - " . $deletedList->getName() . "\n";


```

### Managing subscribers
```php
<?php

require_once __DIR__ . '/init.php';

// Get all subscribers
$subscribers = $listMonk->subscribers()->getAll();
echo "All subscribers:\n";
foreach ($subscribers as $subscriber) {
    echo $subscriber->getId() . " - " . $subscriber->getName() . "\n";
}

// Get a subscriber by id
$subscriber = $listMonk->subscribers()->get(5);
echo "Subscriber with id 1:\n";
echo $subscriber->getId() . " - " . $subscriber->getName() . "\n";

// Create a new subscriber
$newSubscriber = new \AdnanHussainTurki\ListMonk\Models\MonkSubscriber();
$newSubscriber->setName("Test Subscriber");
$newSubscriber->setEmail(random_int(23, 1000). "@gmail.com");
$newSubscriber->setStatus("enabled");
$newSubscriber->setLists([1, 2]);

$newSubscriberMonk = $listMonk->subscribers()->create($newSubscriber);
echo "New subscriber created:\n";
echo $newSubscriberMonk->getId(). " - " . $newSubscriberMonk->getName() . "\n";

// Update the created subscriber
$newSubscriberMonk->setName("Test Subscriber Updated");
$newSubscriberMonk->setEmail(random_int(23, 1000). "@email.com");
$newSubscriberMonk->setStatus("disabled");
$newSubscriberMonk->setLists([1, 2, 3]);
$updatedSubscriber = $listMonk->subscribers()->update($newSubscriberMonk);
echo "Updated subscriber:\n";
echo $updatedSubscriber->getId(). " - " . $updatedSubscriber->getName() . "\n";

// Delete the created subscriber
$deletedSubscriber = $listMonk->subscribers()->delete($updatedSubscriber->getId());
echo "Subscriber deleted:\n";
echo $deletedSubscriber->getId(). " - " . $deletedSubscriber->getName() . "\n";
 
```


### Whats more to be done?
- All routes of `Subscriber` is not yet handled.
- `Campaign` needs to be implemented.
- `Media` needs to be implemented.
- `Import` needs to be implemented.
- `Template` needs to be implemented.
- `Transactional` needs to be implemented.


### Buy me a coffee
[![](https://img.buymeacoffee.com/api/?url=aHR0cHM6Ly9pbWcuYnV5bWVhY29mZmVlLmNvbS9hcGkvP25hbWU9YWRuYW50dXJraSZzaXplPTMwMCZiZy1pbWFnZT1ibWMmYmFja2dyb3VuZD1mZjgxM2Y=&creator=adnanturki&is_creating=building%20cool%20things%20every%20single%20f**king%20day.&design_code=1&design_color=%23ff813f&slug=adnanturki)](https://www.buymeacoffee.com/adnanturki)

### How to contribute
- Create a fork, make changes and send a pull request.
- Raise a issue

### License
Licensed under Apache 2.0. You can check its details [here](https://choosealicense.com/licenses/apache-2.0/ "here").
