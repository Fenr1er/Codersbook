<?php

namespace App\Core;

use App\Core\Database;
use App\Core\Application;



class Model
{
    protected static function db(): Database
    {
        return Application::resolve(Database::class);
    }
}
