<?php

require_once __DIR__ . '/init.php';

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

