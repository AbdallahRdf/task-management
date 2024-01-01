<?php

namespace Backend\App\Models;

use Backend\App\Traits\CRUDTrait;

class User
{
    use CRUDTrait;

    const TABLE = "users";
    const FIRST_NAME = "first_name";
    const LAST_NAME = "last_name";
    const EMAIL = "email";
    const PASSWORD = "password";
    const CONNECTED = "connected";
}