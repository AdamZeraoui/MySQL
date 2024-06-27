<?php ob_start();?>

<table class="uk-table uk-table-striped">
    <thead>
            
    <?php
            $film=$requete->fetch()?>
            <p><img src=<?= $film["movie_poster"]  ?>width="500" height="400" alt = "affiche du film <?= $film["title"]?>"/>
            <p>NOTE : <?= $film["r_ranking"]  ?>
            <p>REALISATEUR : <a href="index.php?action=detDirector&id=<?= $film["id_director"] ?>"><?= $film["last_name"] .' '. $film["first_name"]  ?></a>
            <br><p>SYNOPSIS : <br><?= $film["synopsis"]  ?>
            <br><p>DUREE :<?= $film["duration"]  ?> minutes
            <br><p>GENRE : 
            <?php foreach($requeteGender->fetchALL() as $gender){?><tr>
                    <td><?= $gender["genre_name"] ?></td> 
                <?php }?>
        <tr>
            <th><br>NOM & PRENOM</th>
            <th><br>DATE DE NAISSANCE</th>
            <th><br>RÔLE</th>
        </tr>
    </thead>
    <tbody>
    <?php
            foreach($requeteActor->fetchALL() as $actor){?><tr>
                    <td><a href="index.php?action=detActor&id=<?= $actor["id_actor"] ?>"><?= $actor["last_name"].' '.$actor["first_name"] ?></a></td>
                    <td><?= $actor["fr_birthday"]  ?></td>
                    <td><?= $actor["role_name"]  ?></td>
                </tr>
        <?php   } ?>
    </tbody>
</table>

<?php

$titre = "Détail de ".$film["title"].' ('. $film["publication"].')';
$titre_secondaire = "Détail de ".$film["title"].' ('. $film["publication"].')';
$contenu = ob_get_clean();
require "view/template.php";