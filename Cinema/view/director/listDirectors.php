<?php ob_start();?>

<p class="uk-lable uk-label-warning"> Il y a <?= $requete->rowCount()?> réalisateurs </p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NOM</th>
            <th>PRENOM</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchALL() as $director){?>
                <tr>
                    <td><a href="index.php?action=detDirector&id=<?= $director["id_director"] ?>"><?= $director["last_name"]?></a></td>
                    <td><a href="index.php?action=detDirector&id=<?= $director["id_director"] ?>"><?= $director["first_name"]?></a></td>
                </tr>
    <?php   } ?>
    </tbody>
</table>

<?php

$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";