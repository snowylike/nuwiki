<?php
namespace models;

class Article {
    private $title;
    private $content;
    private $id;

    public function __construct(array $data = array()) {
        if($data) {
            foreach($data as $k => $v) {
                $setterName = 'set' . ucfirst($k);
                if(method_exists($this, $setterName)) {
                    $this->$setterName($v);
                }
            }
        }
    }

    public function getArrayRepresentation(){
        return get_object_vars($this);
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getContent() {
        return $this->content;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }
}
