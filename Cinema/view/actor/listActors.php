<?php ob_start();?>

<p class="uk-lable uk-label-warning"> Il y a <?= $requete->rowCount()?> acteurs </p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NOM</th>
            <th>PRENOM</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchALL() as $actor){?>
                <tr>
                    <td><a href="index.php?action=detActor&id=<?= $actor["id_actor"] ?>"><?= $actor["last_name"]?></a></td>
                    <td><a href="index.php?action=detActor&id=<?= $actor["id_actor"] ?>"><?= $actor["first_name"]?></a></td>
                </tr>
    <?php   } ?>
    </tbody>
</table>

<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";
