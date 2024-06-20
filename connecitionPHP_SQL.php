<h1>Découverte PDO</h1>


<?php


try
{
$mysqlClient = new PDO(
    'mysql:host=localhost;dbname=recetteadam;charsert=utf8',
    'root',
    '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],);
}
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$recipeStatement = $mysqlClient->prepare('SELECT * FROM recipe');
$recipeStatement->execute();
$recipe = $recipeStatement->fetchAll();

$recipeIngredient = $mysqlClient->prepare('SELECT ingredient_name,id_ingredient FROM ingredient');
$recipeIngredient ->execute();
$ingredient= $recipeIngredient->fetchAll(); 

$lienRecipe = $mysqlClient->prepare('SELECT id_recipe, id_ingredient FROM recipe_ingedients' );
$lienRecipe -> execute();
$liens= $lienRecipe->fetchAll();    


    


foreach($recipe as $allRecipe){
    echo '<p>' . $allRecipe['recipe_name'] . ' ' . $allRecipe['preparation_time'] . ' min</p>';

    foreach($liens as $allLiens){
        if($allLiens['id_recipe']== $allRecipe['id_recipe']){
            foreach($ingredient as $allIngredient){
                if($allIngredient['id_ingredient'] == $allLiens['id_ingredient']){
                    echo'<p>' . $allIngredient['ingredient_name'] . '</p>';
                }
            }
        }
    }
    echo '<br>';
}



//AFFICHER UNE SEUL RECETTE ET LA CATEGORIE POUR LA SUITE

?>
