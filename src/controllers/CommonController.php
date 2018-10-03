<?php
namespace controllers;

abstract class CommonController {

    protected $template;
    protected $content;

    protected function setTemplate($template) {
        $basepath = 'src/templates/';

        $template = $this->pathPrepper($basepath.$this.'/'.$template.'.tpl.php');

        $this->template = file_exists($template) ?
                        $template : $basepath.'404.tpl.php';
    }

    public function getTemplate() {
        return $this->template;
    }

    protected function pathPrepper($path) {
        return preg_replace('/\//', DIRECTORY_SEPARATOR, $path);
    }

    protected function cleaner($data) {
        $secured;
        if(is_array($data)) {
            foreach($data as $k => $v) {
                $secured[$k] = htmlentities($v, ENT_QUOTES, 'utf-8');
                $secured[$k] = trim($secured[$k]);
            }
        } else {
            $secured = htmlentities($data, ENT_QUOTES, 'utf-8');
            $secured = trim($secured);
        }
        return $secured;
    }

    protected function redirect($location) {
        header('Location: '.$location);
        exit;
    }

    protected function setMessage($message) {
        if(isset($_SESSION['message'])) {
            $tempmessage = unserialize($_SESSION['message']);
        }
        $tempmessage[] = $message;
        $_SESSION['message'] = serialize($tempmessage);
    }

    protected function getMessage() {
        if(isset($_SESSION['message'])) {
            $tempmessage = unserialize($_SESSION['message']);
            unset($_SESSION['message']);
        } else {
            $tempmessage = null;
        }
        return $tempmessage;
    }

    protected function addToContent($key, $data) {
        $this->content[$key] = $data;
    }

    protected function getContent() {
        if(isset($_SESSION['content'])) {
            $tempcontent = unserialize($_SESSION['content']);
        } else {
            $tempcontent = null;
        }
        return $tempcontent;
    }

    protected function finalizeContent() {
        $tempcontent = serialize($this->content);
        $_SESSION['content'] = $tempcontent;
    }
}
