<?php

/**
 * use the wlRestService instance for registerController all Classes
 */
$directory = './controller/';
$scanned_directory = array_diff(scandir($directory), array("..", ".", "autoload.php", "Util.php"));

foreach ($scanned_directory as $nombre_clase):
    require_once $nombre_clase;
    $nombre_clase_replace = str_replace(".php", "", $nombre_clase);
    $service->registerController(new $nombre_clase_replace);
endforeach;

