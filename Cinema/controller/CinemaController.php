<?php

namespace Controller;
use Model\Connect;

class CinemaController{

    /*lister les films*/
    public function listFilms(){
        $pdo= Connect::seConnecter();
        $requete = $pdo->query("SELECT titre, annee_sortie FROM film"); /*il faudrat mettre les bon therme*/
        require"view/listFilms.php";
    }

    /*liste des acteurs*/
    public function listActeurs(){
        $pdo= Connect::seConnecter();
        $requete = $pdo->query("SELECT titre, annee_sortie FROM actor"); /*il faudrat mettre les bon therme*/
        require"view/listActeurs.php";
    }
}