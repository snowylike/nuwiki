<?php
namespace controllers;

class UserController extends CommonController {

    public function indexAction() {
        $this->setTemplate('index');
    }

    public function __toString() {
        return 'User';
    }
}
