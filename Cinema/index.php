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
        case "listActors" : $ctrlCinema ->listActors(); break;
        case "detActor" :$ctrlCinema ->detActor($id);break;
        case "listDirectors" : $ctrlCinema ->listDirectors();break;
        case "detFilms": $ctrlCinema ->detFilm($id);break;
        case "detDirector" : $ctrlCinema ->detDirector($id);break;



    }
}