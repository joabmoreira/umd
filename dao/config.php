<?php
/**
 * Created by PhpStorm.
 * User: joab
 * Date: 25/05/2018
 * Time: 22:48
 */
spl_autoload_register(function($class_name){
    $filename = "../classes".DIRECTORY_SEPARATOR.$class_name.".php";
    if (file_exists(($filename))){
        require_once($filename);
    }
});
?>