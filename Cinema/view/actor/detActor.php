<?php ob_start();?>

<table class="uk-table uk-table-striped">
    <thead>
            
    <?php
            $actor=$requete->fetch()?>
            <p><?= $actor["fr_birthday"]  ?>
            <p><?= $actor["gender"]  ?>
        <tr>
            <th>PARUTION</th>
            <th>FILMOGRAPHIE</th>
            <th>PERSONNAGE</th>
            <th>NOTE</th>
        </tr>
    </thead>
    <tbody>

        <?php
            foreach($requeteRole->fetchALL() as $role){?><tr>
                    <td><?= $role["publication"]  ?></td>
                    <td><?= $role["title"]  ?></td>
                    <td><?= $role["role_name"]  ?></td>
                    <td><?= $role["r_ranking"]  ?> / 5</td>
                </tr>
        <?php   } ?>
        
    </tbody>
</table>

<?php

$titre = "Détail de ".$actor["first_name"].' '. $actor["last_name"] ;
$titre_secondaire = "Détail de ".$actor["first_name"].' '. $actor["last_name"] ;
$contenu = ob_get_clean();
require "view/template.php";