<?php ob_start();?>

<table class="uk-table uk-table-striped">
    <thead>
            
    <?php
            $film=$requete->fetch()?>
            <p><?= $film["r_ranking"]  ?>
            <br><p><?= $film["synopsis"]  ?>
            <br><p><?= $film["duration"]  ?> minutes
        <tr>
            <th>PARUTION</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<?php

$titre = "Détail de ".$film["title"].' ('. $film["publication"].')';
$titre_secondaire = "Détail de ".$film["title"].' ('. $film["publication"].')';
$contenu = ob_get_clean();
require "view/template.php";