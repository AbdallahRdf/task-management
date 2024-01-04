<?php

namespace Backend\App\Models;

use Backend\App\Database\Database;
use Backend\App\Traits\CRUDTrait;

class UserWorkspace
{
    use CRUDTrait;

    const TABLE = "users_workapces";
    const USER_ID = "user_id";
    const WORKSPACE_ID = "workspace_id";
    const PERMISSION_ID = "permission_id";
}