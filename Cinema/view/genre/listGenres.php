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

<dev class="w_form">
    <form method="POST" action="index.php?action=addGenre">
        <input type="text" id="gender" name="gender" placeholder="Entrer un genre de film" required/>
        <input type="submit" name="submit" value="Ajouter">
    </form>
</dev>

<?php

$titre = "Liste des genres";
$titre_secondaire = "Liste des genres";
$contenu = ob_get_clean();
require "view/template.php";
