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
<dev class="w_form">
    <form method="POST" action="index.php?action=addActor">
    <br><input type="text" id="person" name="last_name" placeholder="Entrer un Nom" required/><br>
        <input type="text" id="person" name="first_name" placeholder="Entrer un Prenom" required/><br><br>
        Entrer date de naissance<br><input type="date" id="person" name="birthday" required/><br><br>
        Choisir un genre<br><input type="radio" id="person" name="gender" value="♂" checked/>
        <label for ="person">♂</label><br>
        <input type="radio" id="person" name="gender" value="♀" checked/>
        <label for ="person">♀</label><br><br>
        <input type="submit" name="submit" value="Ajouter">
    </form>
</dev>
<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";
