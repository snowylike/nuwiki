<?php
namespace models;

abstract class CommonModel {

    public function getArrayRepresentation() {
        return get_object_vars($this);
    }

}
