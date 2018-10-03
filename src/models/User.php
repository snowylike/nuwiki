<?php

class User extends CommonModel {

    private $name = '';
    private $surname = '';
    private $password = '';
    private $id = 0;
    private $nick = '';
    private $groupright = '';

    private function setName($name) {
        $this->name = $name;
    }

    private function getName() {
        return $this->name;
    }
    private function setName($name) {
        $this->name = $name;
    }

    private function getName() {
        return $this->name;
    }

    private function setPassword($password) {
        $this->password = $password;
    }

    private function getPassword() {
        return $this->password;
    }

    private function setId($id) {
        $this->id = $id;
    }

    private function getId() {
        return $this->id;
    }

    private function setNick($nick) {
        $this->nick = $nick;
    }

    private function getNick() {
        return $this->nick;
    }

    private function setGroupright($groupright) {
        $this->groupright = $groupright;
    }

    private function getGroupright() {
        return $this->groupright;
    }
}
