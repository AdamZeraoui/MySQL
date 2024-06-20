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

foreach($recipe as $allRecipe) {
    ?><p><?php echo $allRecipe['recipe_name'];?> <?php
    echo $allRecipe['preparation_time']; ?> min</p>
    <?php
}
    
    
$recipeIngredient = $mysqlClient->prepare('SELECT ingredient_name FROM ingredient');
$recipeIngredient ->execute();
$ingredient= $recipeIngredient->fetchAll();

foreach($ingredient as $allIngredient) {
    ?><p><?php echo $allIngredient['ingredient_name'];?></p>
    <?php
}
    
?>