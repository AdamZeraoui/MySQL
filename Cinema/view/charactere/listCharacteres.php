<?php ob_start();?>

<p class="uk-lable uk-label-warning"> Il y a <?= $requete->rowCount()?> roles dans la BDD </p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>LES ROLES</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchALL() as $role){?>
                <tr>
                    <td><?= $role["role_name"]?></td>
                </tr>
    <?php   } ?>
    </tbody>
</table>

<dev class="w_form">
    <form method="POST" action="index.php?action=addRole">
        <input type="text" id="charactere" name="charactere" placeholder="Entrer un role" required/>
        <input type="submit" name="submit" value="Ajouter">
    </form>
</dev>

<?php

$titre = "Liste des roles";
$titre_secondaire = "Liste des roles";
$contenu = ob_get_clean();
require "view/template.php";
