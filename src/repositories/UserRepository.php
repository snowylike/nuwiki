<?php
namespace repositories;

use \models\User;
use \PDO;

class UserRepository {

    public function findAll() {
        $dbname = 'mysql:host=localhost;dbname=nuwiki';
        $user = 'root';
        $dbcon = new PDO($dbname,$user);
        $user = $dbcon->query('SELECT * from user;');
        $temp = $user->fetchAll();
        $entries = array(),
        foreach($temp as $e) {
            $entries[] = new User($e);
        }
        $user = null;
        $dbcon = null;
        return $entries;
    }
}
