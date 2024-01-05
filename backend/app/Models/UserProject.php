<?php

namespace Backend\App\Models;

use Backend\App\Traits\CRUDTrait;

class UserProject
{
    use CRUDTrait;

    const USER_ID = "user_id";
    const WORKSAPCE_ID = "workspace_id";
    const PERMISSION_ID = "permission_id";
    const TASK_ID = "task_id";
}