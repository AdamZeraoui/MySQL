<?php

namespace Controller;
use Model\Connect;

class GenreController{
    public function listGenres(){
        $pdo= Connect::seConnecter();
        $requete = $pdo->query("SELECT * FROM film_genre"); 

        require"view/genre/listGenres.php";
    }

    public function addGenre(){
        if(isset($_POST["submit"])){
            $pdo= Connect::seConnecter();
            $genre_name = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //Filtre pour ne pas avoir de caracteres spécials dans le champ de texte et éviter les risques d'injections.
            $sql ="INSERT INTO film_genre (genre_name) VALUES (:genre_name)"; // ATTENTION dans la VALUES() il est interdit de mettre une variable pour éviter le rique d'injection SQL ! 

            $requeteInsertGenre = $pdo->prepare($sql); //on prepare la BDD avant de l'executer.
            $requeteInsertGenre->execute(["genre_name" => $genre_name]); //C'est lorsqu'on execute qu'on entre la variable

            header("Location: index.php?action=listGenres"); // redirection pour afficher la même page
        }
    }
}