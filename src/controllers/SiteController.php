<?php
namespace controllers;

use \models\Site;

class SiteController extends CommonController {

    private $controller;
    private $action;
    private $site;

    public function __construct() {
        $this->site = new Site($this->getSiteInfo());
        $this->conclude();
    }

    public function conclude() {
        $this->getController();
        $this->getAction();

        if(method_exists($this->controller, $this->action)) {
            $action = $this->action;

            $this->controller->$action();
        } else {
            $this->controller->indexAction();
        }

        extract($this->getSiteArray());

        $message = $this->getMessage();
        $content = $this->getContent();
        extract($content);

        $template = $this->controller->getTemplate();
        $layout = $this->pathPrepper('src/templates/layout.tpl.php');
        require_once($layout);
    }

    public function getController() {
        $controller = $_GET['controller'] ?? 'Index';
        $controller .= 'Controller';
        $controller = nesting.'\\'.$controller;

        if(file_exists($this->pathPrepper('src/'.$controller.)'.php')) {
            $this->controller = new $controller();
        } else {
            $this->controller = new IndexController();
        }
    }

    public function getAction() {
        $action = $_GET['action'] ?? 'index';
        $action .= 'Action';

        $this->action = $action;
    }

    public function getSiteArray() {
        return $this->site->getArrayRepresentation();
    }

    public function getSiteInfo() {
        $data = file_get_contents($this->pathPrepper('data/site.txt'));
        $data = unserialize($data);
        return $data;
    }

}
