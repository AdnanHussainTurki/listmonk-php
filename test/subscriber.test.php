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

