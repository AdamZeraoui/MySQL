<?php

use Controller\CinemaController;

spl_autoload_register(function($class_name){
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();
$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])){
    switch ($_GET["action"]) {
        case "listFilms" : $ctrlCinema->listFilms(); break;
        case "listActor" : $ctrlCinema ->listActor(); break;
        case "detActor" :$ctrlCinema ->detActor($id);break;
        case "listDirector" : $ctrlCinema ->listDirector();break;



    }
}