<?php ob_start();?>

<p class="uk-lable uk-label-warning"> Il y a <?= $requete->rowCount()?> genres de film </p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TYPE DE GENRE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchALL() as $genre){?>
                <tr>
                    <td><?= $genre["genre_name"]?></td>
                </tr>
    <?php   } ?>
    </tbody>
</table>

<?php

$titre = "Liste des genres";
$titre_secondaire = "Liste des genres";
$contenu = ob_get_clean();
require "view/template.php";

//faire un formulaire pour ajouter un nouveau genre. 