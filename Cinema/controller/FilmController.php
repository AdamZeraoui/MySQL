<?php 

namespace Controller;
use Model\Connect;

class FilmController{

/*lister les films*/
    public function listFilms(){
        $pdo= Connect::seConnecter();
        $requete = $pdo->query("SELECT title, publication, id_film FROM film"); 

        require"view/film/listFilms.php";
    }
    public function detFilm($id){
        $pdo= Connect::seConnecter();
        $requete = $pdo->prepare("SELECT director.id_director, person.first_name, person.last_name, film.title, film.publication, film.synopsis, film_genre.genre_name, film.movie_poster, film.duration, ROUND(ranking, 1) AS r_ranking
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

        $requeteActor = $pdo->prepare("SELECT DISTINCT actor.id_actor, person.first_name, person.last_name, person.gender, charactere.role_name, DATE_FORMAT(person.birthday, '%d/%m/%Y') AS fr_birthday
        FROM play 
        INNER JOIN actor ON play.id_actor = actor.id_actor
        LEFT JOIN person ON actor.id_person = person.id_person
        LEFT JOIN film ON play.id_film = film.id_film
        LEFT JOIN charactere ON play.id_charactere = charactere.id_charactere
        WHERE play.id_film = :id
        ORDER BY person.last_name");
        $requeteActor->execute(["id" => $id]);
        require "view/film/detFilm.php";
    }
}