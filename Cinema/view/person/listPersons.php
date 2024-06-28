<?php ob_start();?>

<p class="uk-lable uk-label-warning"> Il y a <?= $requete->rowCount()?> personne dans la BDD </p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Liste des Personnes</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchALL() as $person){?>
                <tr>
                    <td><?= $person["last_name"].' '. $person["first_name"]?></td>
                </tr>
    <?php   } ?>
    </tbody>
</table>

<dev class="w_form">
    <form method="POST" action="index.php?action=addLastName">
        <input type="text" id="person" name="person.last_name" placeholder="Entrer le nom d'une personne" required/>
        <input type="submit" name="submit" value="Ajouter"><br>
        <input type="text" id="person" name="person.first_name" placeholder="Entrer le prenom d'une personne" required/>
        <input type="submit" name="submit" value="Ajouter"><br>
    </form>
</dev>

<?php

$titre = "Liste des Personnes";
$titre_secondaire = "Liste des Personnes";
$contenu = ob_get_clean();
require "view/template.php";
