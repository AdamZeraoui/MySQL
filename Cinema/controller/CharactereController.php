<?php

namespace Controller;
use Model\Connect;

class CharactereController{
    public function listCharacteres(){
        $pdo= Connect::seConnecter();
        $requete = $pdo->query("SELECT * FROM charactere"); 

        require"view/charactere/listCharacteres.php";
    }

    public function addRole(){
        if(isset($_POST["submit"])){
            $pdo= Connect::seConnecter();
            $role_name = filter_input(INPUT_POST, "charactere", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sql ="INSERT INTO charactere (role_name) VALUES (:role_name)";

            $requeteInsertRole = $pdo->prepare($sql);
            $requeteInsertRole->execute(["role_name" => $role_name]);

            header("Location: index.php?action=listCharacteres");
        }
    }
}