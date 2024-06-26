<?php ob_start();?>

<p class="uk-lable uk-label-warning"> Il y a <?= $requete->rowCount()?> acteur </p>

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
                    <td><?= $actor /*à completer*/ ?></td>
                    <td><?= $actor /*à completer*/ ?></td>
                </tr>
    <?php   } ?>
    </tbody>
</table>

<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteur";
$contenu = ob_get_clean();
require "view/template.php";