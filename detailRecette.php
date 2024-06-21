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



$id_recipe = $_GET["id"];


$oneRecipe = $mysqlClient->prepare('
    SELECT * 
    FROM recipe 
    INNER JOIN recipe_ingedients ON recipe.id_recipe = recipe_ingedients.id_recipe 
    INNER JOIN category ON recipe.id_category = category.id_category
    WHERE recipe.id_recipe = :id_recipe
');


$oneRecipe->execute(['id_recipe' => $id_recipe]);


$theRecipe = $oneRecipe->fetch(PDO::FETCH_ASSOC);

if ($theRecipe) {
    echo $theRecipe['recipe_name'] . " (catégorie des " . $theRecipe['category_name'] . "s)<br><img src='".$theRecipe['image']."'width = '300' height='300'> : <br> Temps de Préparation = " . $theRecipe['preparation_time'] . " minutes.<br> Liste des ingrédients :";


    $ingredientList = $mysqlClient->prepare('
        SELECT ingredient_name 
        FROM ingredient 
        INNER JOIN recipe_ingedients ON ingredient.id_ingredient = recipe_ingedients.id_ingredient 
        WHERE recipe_ingedients.id_recipe = :id_recipe
    ');
    $ingredientList->execute(['id_recipe' => $id_recipe]);
    $ingredients = $ingredientList->fetchAll(PDO::FETCH_ASSOC);

    echo '<ul>';
    foreach ($ingredients as $ingredient) {
        echo '<li>' . $ingredient['ingredient_name'] . '</li>';
    }
    echo '</ul><br>Voici la recette :'. $theRecipe['instructions'];
} else {
    echo '<p>Recette non trouvée.</p>';
}


?>