<?php ob_start();?>

<table class="uk-table uk-table-striped">
    <thead>
            
    <?php
            $director=$requete->fetch()?>
            <p><?= $director["fr_birthday"]  ?>
            <p><?= $director["gender"]  ?>
        <tr>
            <th>PARUTION</th>
            <th>FILMOGRAPHIE</th>
            <th>NOTE</th>
        </tr>
    </thead>
    <tbody>

        <?php
            foreach($requeteDo->fetchALL() as $do){?><tr>
                    <td><?= $do["publication"]  ?></td>
                    <td><a href="index.php?action=detFilm&id=<?= $do["id_film"] ?>"><?= $do["title"]  ?></a></td>
                    <td><?= $do["r_ranking"]  ?> / 5</td>
                </tr>
        <?php   } ?>
        
    </tbody>
</table>

<?php

$titre = "Détail de ".$director["first_name"].' '. $director["last_name"] ;
$titre_secondaire = "Détail de ".$director["first_name"].' '. $director["last_name"] ;
$contenu = ob_get_clean();
require "view/template.php";