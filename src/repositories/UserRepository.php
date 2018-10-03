<?php
namespace repositories;

use \models\User;

class UserRepository {

    public function findAll() {
        $data = explode("\r\n", trim(file_get_contents('data/user.txt'), "\r\n"));
        $entries = array();
        foreach($data as $e) {
            $entries[] = new User(unserialize($e));
        }
        return $entries;
    }

    public function firstUser() {
        $dbcon = new PDO('mysql:host=localhost;dbname=nuwiki');
        $user = $dbcon->query('SELECT * from user WHERE ID = 1');
        print_r($user);
        $user = null;
        $dbcon = null;
    }
}
