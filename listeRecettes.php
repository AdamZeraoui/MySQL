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
    echo '<p><a href="detailRecette.php?id='.$allRecipe['id_recipe'].'">'. $allRecipe['recipe_name'] . '</a> ' . $allRecipe['preparation_time'] . ' min</p><br>';

}