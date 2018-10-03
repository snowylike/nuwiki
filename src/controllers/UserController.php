<?php
namespace controllers;

use \models\User;
use \repositories\UserRepository as Repo;

class UserController extends CommonController {

    public function indexAction() {
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
            //add validation here

            $secured['groupright'] = 'r';
            $repo->add(new User($secured)); 
        } else {
            $this->setTemplate('add');
        }
    }
}
