<head><h1>Decouverte PDO</h1>
</head>

<?php

try
{
$mysqlClient = new PDO(
    'mysql:host=localhost;dbname=recetteadam;charsert=utf8',
    'root',
    '');
}
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
//b//

?>
