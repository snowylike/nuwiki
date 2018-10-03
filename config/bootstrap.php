<?php

session_start();

function loader($class) {
    require_once('src'.DIRECTORY_SEPARATOR.$class.'.php');
}

function prepper() {
    $data = array(
        'title' => 'NuWiki',
        'charset' => 'utf-8',
        'author' => 'Hendrik Kosmol',
        'style' => 'style',
        'description' => 'A basic wiki made in php');
    file_put_contents('data/site.txt', serialize($data));
}

spl_autoload_register('loader');
