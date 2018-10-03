<?php
namespace models;

abstract class ModelInterface {

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

}
