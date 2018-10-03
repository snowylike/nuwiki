<?php
namespace repositories;

use \models\User;
use \PDO;

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
        $dbname = 'mysql:host=localhost;dbname=nuwiki';
        $user = 'root';
        $dbcon = new PDO($dbname,$user);
        $user = $dbcon->query('SELECT * from user WHERE ID = 1');
        $temp = $user->fetchAll();
        print_r($temp);
        $user = null;
        $dbcon = null;
    }
}
