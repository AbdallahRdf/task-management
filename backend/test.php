<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'vendor/autoload.php';
require_once "app/Util/functions.php";

use Backend\Handlers\Controllers\Auth;
use Backend\App\Models\Workspace;


echo "hell";

// User::create("abdallah", "radfi", "abdoulah@gmail.com", "password");

// dd(User::get("abdolah@gmail.com"));

// Workspace::update(1, [
//     Workspace::NAME => "Workspace 1",
//     Workspace::DESCRIPTION => "Description 2"
// ]);

// Workspace::update(1, []);

// Auth::sign_up('abd', "rad", "ald@gm.co", "lqsdlkfiej");
