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
            $data = $repo->findAll();
            $this->addToContent('entry', $data);

            $this->finalizeContent();
            $this->setTemplate('index');
        } else {
            $this->setTemplate('add');
        }
    }

    public function delAction() {
        if(isset($_GET['id'])) {
            $repo = new Repo();
            $repo->del($_GET['id']);
            $data = $repo->findAll();
            $this->addToContent('entry', $data);

            $this->finalizeContent();
            $this->setTemplate('index');
        } else {
            $this->setTemplate('index');
        }
    }

    public function modAction() {
        if(isset($_POST['modUser'])) {
            $secured = $this->cleaner($_POST);
            $repo = new Repo();
            //add validation here
            $user = new User($secured);
            var_dump($user->getArrayRepresentation());

            $data = $repo->findAll();
            $this->addToContent('entry', $data);

            $this->finalizeContent();
            $this->setTemplate('index');
        } else {
            $repo = new Repo();
            $usertomod = $repo->getByID($_GET['id']);
            $this->addToContent('user', $usertomod);
            $this->addToContent('entry', $repo->findAll());
            $this->finalizeContent();
            $this->setTemplate('mod');
        }

    }
}
