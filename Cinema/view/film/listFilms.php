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
<div class="w_form">
    <form method="POST" action="index.php?action=addFilm"><br>
        Ajouter un film :
        <br><br>
        <input type="text" id="film" name ="title" placeholder="Entrer le titre du film" required/>
        <br>
        <label for="director-select"> Selectionner le réalisateur :</label>
        <select name="director" id="director-select" required>

        <?php
            foreach($requeteWho->fetchALL() as $who){?>
                <option value="<?= $who["id_director"] ?>"><?= $who["last_name"]." ".$who["first_name"]?></option>
        <?php   } ?>
        </select><br>

        <label for="year">Entrer l'année de parution :</label>
        <input type="number" id="year" name="publication" min="1920" max="2025" required/><br>
        
        <label for="genre[]"> Selectionner le genre : </label><br>

        <?php 
            foreach($requeteWhat->fetchALL() as $what){ ?>
                <input type="checkbox" id="genre_<?= $what["id_film_genre"]?>" name="genre[]" value="<?= $what["id_film_genre"]?>">
                <label for="genre"<?= $what["id_film_genre"]?>"><?= $what["genre_name"]?></label><br>
        <?php    } ?>

        <textarea id="synopsis" name="synopsis" rows="5" cols="40" placeholder="Synopsis ici" required></textarea><br>
        <label for="ranking">Note :</label>
        <input type="number" id="ranking" name="ranking" min="0" max="5" required/><br>
        <label for="duration">Entrer la durée du film en minute :</label>
        <input type="number" id="duration" name="duration" min="0" required/><br>

        <label for="movie_poster">Adresse HTTP de l'image :</label>
        <input type="text" id="movie_poster" name="movie_poster" placeholder="Adresse http de l'image" required/><br>

        <input type="submit" name="submit" value="Ajouter">
    </form>


</div>
<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";