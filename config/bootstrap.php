<?php

session_start();

function loader($class) {
    require_once('src'.DIRECTORY_SEPARATOR.$class.'.php');
}

spl_autoload_register('loader');
