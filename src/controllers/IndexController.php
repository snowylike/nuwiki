<?php
namespace controllers;

class IndexController extends CommonController {

    public function indexAction() {
        $this->setTemplate('index');
    }

    public function __toString() {
        return 'Index';
    }
}
