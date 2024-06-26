<?php ob_start();?>

<table class="uk-table uk-table-striped">
    <thead>
            
    <?php
            $film=$requete->fetch()?>
            <p>NOTE : <?= $film["r_ranking"]  ?>
            <br><p>SYNOPSIS : <br><?= $film["synopsis"]  ?>
            <br><p>DUREE :<?= $film["duration"]  ?> minutes
        <tr>
            <th>NOM & PRENOM</th>
            <th>DATE DE NAISSANCE</th>
            <th>RÔLE</th>
        </tr>
    </thead>
    <tbody>
    <?php
            foreach($requeteActor->fetchALL() as $actor){?><tr>
                    <td><?= $actor["last_name"].' '.$actor["first_name"] ?></td>
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