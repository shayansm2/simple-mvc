<?php

namespace App\Models;

use Core\DB;
use PDO;

class User
{
    public static function all()
    {
        $db = DB::get();
        $query = 'SELECT * FROM users';
        $dbResult = $db->query($query);
        $rows = $dbResult->fetchAll(PDO::FETCH_ASSOC);

        $results = [];

        foreach ($rows as $row) {
            unset($row['password']);
            $user = new User();
            foreach ($row as $field => $value) {
                $user->$field = $value;
            }
            $results[] = $user;
        }

        return $results;
    }
}
