<?php
namespace models;

class Site {

    private $charset = '';
    private $title = '';
    private $author = '';
    private $style = '';
    private $description = '';
    private $remoteIP = '';
    private $userAgent = '';

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

    public function __toString() {
        return $this->author.' - '.$this->title;
    }

    public function getCharset() {
        return $this->charset;
    }

    public function setCharset($charset) {
        $this->charset = $charset;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }


    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getStyle() {
        return $this->style;
    }

    public function setStyle($style) {
        $this->style = $style;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getRemoteIP() {
        return $this->remoteIP;
    }

    public function setRemoteIP($remoteIP) {
        $this->remoteIP = $remoteIP;
    }

    public function getUserAgent() {
        return $this->userAgent;
    }

    public function setUserAgent($userAgent) {
        $this->userAgent = $userAgent;
    }
}
