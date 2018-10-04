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
        $insstatement = $dbcon->prepare("INSERT INTO user (name, surname, nick, password, groupright) VALUES (:name, :surname, :nick, :password, :groupright);");
        $name = $userdata->getName();
        $surname = $userdata->getSurname();
        $nick = $userdata->getNick();
        $password = $userdata->getPassword();
        $groupright = $userdata->getGroupright();
        $insstatement->bindParam(':name', $name);
        $insstatement->bindParam(':surname', $surname);
        $insstatement->bindParam(':nick', $nick);
        $insstatement->bindParam(':password', $password);
        $insstatement->bindParam(':groupright', $groupright);
        $insstatement->execute();
        $insstatement = null;
        $dbcon = null;
    }

    public function mod(User $userdata) {
        $dbname = 'mysql:host=localhost;dbname=nuwiki';
        $user = 'root';
        $dbcon = new PDO($dbname,$user);
        $insstatement = $dbcon->prepare("UPDATE user SET name = :name, surname = :surname, nick = :nick WHERE id = :id;");
        $name = $userdata->getName();
        $surname = $userdata->getSurname();
        $nick = $userdata->getNick();
        $id = $userdata->getId();
        $insstatement->bindParam(':name', $name);
        $insstatement->bindParam(':surname', $surname);
        $insstatement->bindParam(':nick', $nick);
        $insstatement->bindParam(':id', $id);
        $insstatement->execute();
        $insstatement = null;
        $dbcon = null;
    }

    public function del($id) {
        $dbname = 'mysql:host=localhost;dbname=nuwiki';
        $user = 'root';
        $dbcon = new PDO($dbname,$user);
        $stmt = $dbcon->prepare("DELETE FROM user WHERE id=:id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt = null;
        $dbcon = null;
    }

    public function getByID($id) {
        $dbname = 'mysql:host=localhost;dbname=nuwiki';
        $user = 'root';
        $dbcon = new PDO($dbname,$user);
        $stmt = $dbcon->prepare('SELECT * FROM user WHERE id = :id;');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $temp = $stmt->fetchAll();
        $entry = new User($temp[0]);
        $user = null;
        $dbcon = null;
        return $entry;

    }
}
