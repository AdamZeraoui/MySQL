<?php ob_start();?>

<p class="uk-lable uk-label-warning"> Il y a <?= $requete->rowCount()?> films </p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE SORTIE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchALL() as $film){?>
                <tr>
                    <td><a href="index.php?action=detFilm&id=<?= $film["id_film"] ?>"><?= $film["title"]?></a></td>
                    <td><?= $film["publication"]?></td>
                </tr>
    <?php   } ?>
    </tbody>
</table>

<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";