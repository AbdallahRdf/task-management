<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'vendor/autoload.php';

use Backend\App\Models\Workspace;

require_once "app/util/functions.php";

echo "hell";

// User::create("abdallah", "radfi", "abdoulah@gmail.com", "password");

// dd(User::get("abdolah@gmail.com"));

Workspace::update(1, [
    Workspace::NAME => "Workspace 1",
    Workspace::DESCRIPTION => "Description 2"
]);

Workspace::update(1, []);
