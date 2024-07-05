<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/Cinema.css">
<!-- remplire LINK and META -->
    <title><?= $titre ?></title>
</head>
<body>
    <div id ="wrapper" class = "uk-container uk-container-expand">
        <nav class = "top">
            <ul>
                <li><a href="index.php?action=listFilms">Films</a></li>
                <li><a href="index.php?action=listActors">Acteurs</a></li>
                <li><a href="index.php?action=listDirectors">Realisateurs</a></li>
                <li><a href="index.php?action=listGenres">Genre de film</a></li>
                <li><a href="index.php?action=listCharacteres">Role</a></li>
                <li><a href=""></a></li>
            </ul>
        </nav>
        <main>
            <div id="contenu">
                <h1 class ="uk-heading-divider">PDO Cinema</h1>
                <h2 class ="uk-heading-bullet"><?= $titre_secondaire ?></h2>
                <?= $contenu ?>
            </div>
        </main>
    </div>
</body>