<?php

require __DIR__ . '/../vendor/autoload.php';

// Read files from .credentials
try {
    $credentials = json_decode(file_get_contents(__DIR__ . '/.credentials'), true);
} catch (\Throwable $th) {
    echo "Error reading credentials file: " . $th->getMessage();
    exit;
}

// Create a new ListMonk instance
$listMonk = new \AdnanHussainTurki\ListMonk\ListMonk(
    $credentials['serverUrl'],
    $credentials['username'],
    $credentials['password']
);

?>