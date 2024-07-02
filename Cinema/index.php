<?php

use Controller\GenreController;
use Controller\FilmController;
use Controller\ActorController;
use Controller\DirectorController;
use Controller\CharactereController;

spl_autoload_register(function($class_name){
    include $class_name . '.php';
});

$ctrlDirector = new DirectorController();
$ctrlFilm = new FilmController();
$ctrlActor = new ActorController();
$ctrlGenre = new GenreController();
$ctrlCharactere = new CharactereController();


$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])){
    switch ($_GET["action"]) {
        case "listFilms" : $ctrlFilm->listFilms(); break;
        case "detFilm": $ctrlFilm ->detFilm($id);break;
        case "listActors" : $ctrlActor ->listActors(); break;
        case "detActor" :$ctrlActor ->detActor($id);break;
        case "listDirectors" : $ctrlDirector ->listDirectors();break;
        case "detDirector" : $ctrlDirector ->detDirector($id);break;
        case "listGenres" : $ctrlGenre -> listGenres();break;
        case "addGenre": $ctrlGenre->addGenre();break;
        case "listCharacteres": $ctrlCharactere->listCharacteres();break;
        case "addRole": $ctrlCharactere->addRole();break;
        case "addActor": $ctrlActor->addActor();break;
        case "addDirector" : $ctrlDirector->addDirector();break;
    }
}
