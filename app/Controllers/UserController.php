<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function users()
    {
        $allUsers = User::all();
        echo json_encode($allUsers);
    }
}
