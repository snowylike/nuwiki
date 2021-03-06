<?php
namespace models;

class User {

    private $name = '';
    private $surname = '';
    private $password = '';
    private $id = 0;
    private $nick = '';
    private $groupright = '';

    public function __construct(array $data = array()) {
        if($data) {
            foreach($data as $k => $v) {
                $setterName = 'set'.ucfirst($k);
                if(method_exists($this, $setterName)) {
                    $this->$setterName($v);
                }
            }
        }
    }

    public function getArrayRepresentation() {
        return get_object_vars($this);
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
    public function setSurname($surname) {
        $this->surname = $surname;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setNick($nick) {
        $this->nick = $nick;
    }

    public function getNick() {
        return $this->nick;
    }

    public function setGroupright($groupright) {
        $this->groupright = $groupright;
    }

    public function getGroupright() {
        return $this->groupright;
    }
}
