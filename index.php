<?php

require('config'.DIRECTORY_SEPARATOR.'bootstrap.php');

define('nesting', 'controllers');
if(!file_exists('data/site.txt')) {
    prepper();
}

new controllers\SiteController();

?>
