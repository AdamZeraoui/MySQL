<?php

namespace Controller;
use Model\Connect;

class GenreController{
    public function listGenres(){
        $pdo= Connect::seConnecter();
        $requete = $pdo->query("SELECT * FROM film_genre"); 

        require"view/genre/listGenres.php";
    }
}