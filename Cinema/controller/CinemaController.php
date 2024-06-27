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
    public function detFilms($id){
        $pdo= Connect::seConnecter();
        $requete = $pdo->prepare("SELECT person.first_name, person.last_name, film.title, film.publication, film.synopsis, film_genre.genre_name, film.movie_poster, film.duration, ROUND(ranking, 1) AS r_ranking
        FROM film 
        INNER JOIN attribut ON film.id_film = attribut.id_film
        LEFT JOIN film_genre ON attribut.id_film_genre = film_genre.id_film_genre
        LEFT JOIN director ON film.id_director = director.id_director
        LEFT JOIN person ON director.id_person = person.id_person
        WHERE film.id_film =:id");
        $requete->execute(["id"=>$id]);

        $pdo= Connect::seConnecter();
        $requeteGender = $pdo->prepare("SELECT DISTINCT film_genre.genre_name
        FROM film 
        INNER JOIN attribut ON film.id_film = attribut.id_film
        LEFT JOIN film_genre ON attribut.id_film_genre = film_genre.id_film_genre
        WHERE film.id_film =:id");
        $requeteGender->execute(["id"=>$id]);

        $requeteActor = $pdo->prepare("SELECT DISTINCT person.first_name, person.last_name, person.gender, charactere.role_name, DATE_FORMAT(person.birthday, '%d/%m/%Y') AS fr_birthday
        FROM play 
        INNER JOIN actor ON play.id_actor = actor.id_actor
        LEFT JOIN person ON actor.id_person = person.id_person
        LEFT JOIN film ON play.id_film = film.id_film
        LEFT JOIN charactere ON play.id_charactere = charactere.id_charactere
        WHERE play.id_film = :id
        ORDER BY person.last_name");
        $requeteActor->execute(["id" => $id]);
        require "view/film/detFilms.php";
    }

    public function listActor(){
        $pdo= Connect::seConnecter();
        $requete = $pdo->query("SELECT * FROM person 
        INNER JOIN actor ON person.id_person = actor.id_person"); 
        require"view/actor/listActor.php";
    }
    /*détails des acteurs*/
    public function detActor($id){
        $pdo= Connect::seConnecter();
        $requete = $pdo->prepare("SELECT DISTINCT person.first_name, person.last_name, person.gender, DATE_FORMAT(person.birthday, '%d/%m/%Y') AS fr_birthday
        FROM play 
        INNER JOIN actor ON play.id_actor = actor.id_actor
        LEFT JOIN person ON actor.id_person = person.id_person
        LEFT JOIN film ON play.id_film = film.id_film
        LEFT JOIN charactere ON play.id_charactere = charactere.id_charactere
        WHERE play.id_actor = :id ");
        $requete->execute(["id" => $id]);

        $requeteRole = $pdo->prepare("SELECT DISTINCT film.publication, film.title, charactere.role_name, ROUND(ranking,1) as r_ranking
        FROM play 
        INNER JOIN actor ON play.id_actor = actor.id_actor
        LEFT JOIN person ON actor.id_person = person.id_person
        LEFT JOIN film ON play.id_film = film.id_film
        LEFT JOIN charactere ON play.id_charactere = charactere.id_charactere
        WHERE play.id_actor = :id 
        ORDER BY publication ASC");
        $requeteRole->execute(["id" => $id]);
        require"view/actor/detActor.php";
    }

    public function listDirector(){
        $pdo= Connect::seConnecter();
        $requete = $pdo->query("SELECT * FROM person
        INNER JOIN director ON person.id_person = director.id_person"); 
        require"view/director/listDirector.php";
    }

    public function detDirector($id){
        $pdo= Connect::seConnecter();
        $requete = $pdo->prepare("SELECT DISTINCT person.first_name, person.last_name, person.gender, DATE_FORMAT(person.birthday, '%d/%m/%Y') AS fr_birthday
        FROM director
        INNER JOIN person ON director.id_person = person.id_person
        WHERE director.id_director = :id ");
        $requete->execute(["id" => $id]);

        $requeteDo = $pdo->prepare("SELECT DISTINCT film.publication, film.title, ROUND(ranking,1) as r_ranking
        FROM director
        INNER JOIN film ON director.id_director = film.id_director
        WHERE director.id_director = :id 
        ORDER BY publication ASC");
        $requeteDo->execute(["id" => $id]);
        require"view/director/detDirector.php";
    }



}