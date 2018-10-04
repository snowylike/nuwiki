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
        $entries = array();
        foreach($temp as $e) {
            $entries[] = new User($e);
        }
        $user = null;
        $dbcon = null;
        return $entries;
    }

    public function add(User $userdata) {
        $dbname = 'mysql:host=localhost;dbname=nuwiki';
        $user = 'root';
        $dbcon = new PDO($dbname,$user);
        $insstatement = $dbcon->prepare('INSERT INTO user (name, surname, nick, password, groupright) VALUES (:name :surname :nick :password :groupright)');
        $insstatement->bindParam(':name', $userdata->getName());
        $insstatement->bindParam(':surname', $userdata->getSurname());
        $insstatement->bindParam(':nick', $userdata->getNick());
        $insstatement->bindParam(':password', $userdata->getPassword());
        $insstatement->bindParam(':groupright', $userdata->getGroupright());
        $insstatement->execute();
        $insstatement = null;
        $dbcon = null;
    }
}
