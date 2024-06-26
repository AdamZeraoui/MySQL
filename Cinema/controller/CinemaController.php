<?php

namespace Controller;
use Model\Connect;

class CinemaController{

    /*lister les films*/
    public function listFilms(){
        $pdo= Connect::seConnecter();
        $requete = $pdo->query("SELECT title, publication FROM film"); 

        require"view/film/listFilms.php";
    }

    /*détails des acteurs*/
    public function detActeurs($id){
        $pdo= Connect::seConnecter();
        $requete = $pdo->prepare("SELECT * FROM actor WHERE id_actor =id");
        $requete->execute(["id" => $id]);
        require"view/actor/detActeurs.php";
    }
}