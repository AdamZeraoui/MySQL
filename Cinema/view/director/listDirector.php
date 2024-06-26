<?php ob_start();?>

<p class="uk-lable uk-label-warning"> Il y a <?= $requete->rowCount()?> réalisateurs </p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>ID</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchALL() as $director){?>
                <tr>
                    <td><?= $director["last_name"]?></td>
                    <td><?= $director["first_name"]?></td>
                    <td><?= $director["id_person"]?></td>
                </tr>
    <?php   } ?>
    </tbody>
</table>

<?php

$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";