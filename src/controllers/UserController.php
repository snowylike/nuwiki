<?php
namespace controllers;

use \models\User;
use \repositories\UserRepository as Repo;

class UserController extends CommonController {

    public function indexAction() {
        $repo = new Repo();
        $data = $repo->findAll();
        $this->addToContent('entry', $data);

        $this->finalizeContent();
        $this->setTemplate('index');
    }

    public function __toString() {
        return 'User';
    }

    public function listAction() {
        $repo = new Repo();
        $data = $repo->findAll();
        $this->addToContent('entry', $data);

        $this->finalizeContent();
        $this->setTemplate('index');
    }

    public function addAction() {
        if(isset($_POST['addUser'])) {
            $secured = $this->cleaner($_POST);
            $repo = new Repo();
            //add validation here
            $secured['groupright'] = 'r';
            $secured['password'] = password_hash($secured['password'], PASSWORD_DEFAULT);
            $repo->add(new User($secured));
            $this->setTemplate('index');
        } else {
            $this->setTemplate('add');
        }
    }

    public function delAction() {
        if(isset($_GET['id'])) {
            $repo = new Repo();
            $repo->del($_GET['id']);
            $this->setTemplate('index');
        } else {
            $this->setTemplate('index');
        }
    }
}
