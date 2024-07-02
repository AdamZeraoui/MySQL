<?php
namespace Controller;
use Model\Connect;

class DirectorController{

    public function listDirectors(){
        $pdo= Connect::seConnecter();
        $requete = $pdo->query("SELECT * FROM person
        INNER JOIN director ON person.id_person = director.id_person"); 
        require"view/director/listDirectors.php";
    }

    public function detDirector($id){
        $pdo= Connect::seConnecter();
        $requete = $pdo->prepare("SELECT DISTINCT person.first_name, person.last_name, person.gender, DATE_FORMAT(person.birthday, '%d/%m/%Y') AS fr_birthday
        FROM director
        INNER JOIN person ON director.id_person = person.id_person
        WHERE director.id_director = :id ");
        $requete->execute(["id" => $id]);

        $requeteDo = $pdo->prepare("SELECT DISTINCT film.id_film ,film.publication, film.title, ROUND(ranking,1) as r_ranking
        FROM director
        INNER JOIN film ON director.id_director = film.id_director
        WHERE director.id_director = :id 
        ORDER BY publication ASC");
        $requeteDo->execute(["id" => $id]);
        require"view/director/detDirector.php";
    }

    public function addDirector(){
        if(isset($_POST["submit"])){
            $pdo = Connect::seConnecter();

            $last_name = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $first_name = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $birthday = filter_input(INPUT_POST, "birthday", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $sql = "INSERT INTO person (last_name, first_name, birthday, gender) VALUES (:last_name, :first_name, :birthday, :gender)";

            $requeteInsertPerson = $pdo->prepare($sql);
            $requeteInsertPerson->execute([
                "last_name" => $last_name,                     
                "first_name"=>$first_name,
                "birthday"=>$birthday,
                "gender"=>$gender]);

            $id_person = $pdo->lastInsertId();
            $requeteId = $pdo->prepare("INSERT INTO director (id_person) VALUES (:id_person)");
            $requeteId->execute(["id_person" => $id_person]);



            header("Location: index.php?action=listDirectors");

        }
    }
}


