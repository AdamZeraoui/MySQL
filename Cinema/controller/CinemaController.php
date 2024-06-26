<?php

namespace Controller;
use Model\Connect;

class CinemaController{

    /*lister les films*/
    public function listFilms(){
        $pdo= Connect::seConnecter();
        $requete = $pdo->query("SELECT titre, annee_sortie FROM film"); /*il faudrat mettre les bon therme*/
        require"view/film/listFilms.php";
    }

    /*liste des acteurs*/
    public function detActeurs($id){
        $pdo= Connect::seConnecter();
        $requete = $pdo->prepare("SELECT * FROM actor WHERE id_actor =id");
        $requete->execute(["id" => $id]);
        require"view/actor/detActeurs.php";
    }
}