<?php 

namespace Controller;
use Model\Connect;

class FilmController{

/*lister les films*/
    public function listFilms(){
        $pdo= Connect::seConnecter();
        $requete = $pdo->query("SELECT DISTINCT title, publication, id_film FROM film
        ORDER BY film.publication ASC"); 

        $requeteWho = $pdo->query("SELECT * FROM person
        INNER JOIN director ON person.id_person = director.id_person
        INNER JOIN film on director.id_director = film.id_director"); 

        $requeteWhat = $pdo->query("SELECT * from film_genre");
        

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

    public function addFilm(){


        if(isset($_POST["submit"])){
            $pdo = Connect::seConnecter();

            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $publication = filter_input(INPUT_POST, "publication", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $ranking = filter_input(INPUT_POST, "ranking", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $duration = filter_input(INPUT_POST, "duration", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $movie_poster = filter_input(INPUT_POST, "movie_poster", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $sql = "INSERT INTO film (title, id_director, publication, synopsis, ranking, duration, movie_poster) VALUES (:title, :id_director, :publication, :synopsis, :ranking, :duration, :movie_poster)";

            $director=$pdo->query("SELECT * FROM person
            INNER JOIN director ON person.id_person = director.id_person
            INNER JOIN film on director.id_director = film.id_director");

            $requeteAddFilm = $pdo->prepare($sql);
            $requeteAddFilm->execute([
                "title" => $title,     
                ":id_director" => $director,                
                "publication"=>$publication,
                "synopsis"=>$synopsis,
                "ranking"=>$ranking,
                "duration"=>$duration,
                "movie_poster"=>$movie_poster]
            );
            header("Location: index.php?action=listFilms");
             // Insertion des genres associés
            
            

        }

    }
}