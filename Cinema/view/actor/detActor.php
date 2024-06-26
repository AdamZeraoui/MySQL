<?php ob_start();?>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NOM et PRENOM</th>
            <th>ANNEE DE NAISSANCE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchALL() as $actor){?>
                <tr>
                    <td><?= $actor["last_name"].' '. $actor["first_name"]; ?></td>
                    <td><?= $actor["birthday"]  ?></td>
                </tr>
    <?php   } ?>
    </tbody>
</table>

<?php

$titre = "Détail de ".$actor["last_name"].' '. $actor["first_name"] ;
$titre_secondaire = "Détail de ".$actor["last_name"].' '. $actor["first_name"] ;
$contenu = ob_get_clean();
require "view/template.php";