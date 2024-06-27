<head>
    <meta charset="UTF-8">
<!-- remplire LINK and META -->
    <title><?= $titre ?></title>
</head>
<!-- A COMPLETER <nav class="uk-navbar-container">

</nav> -->
<div id ="wrapper" class = "uk-container uk-container-expand">
    <nav>
        <ul>
            <li><a href="index.php?action=listFilms">Films</a></li>
            <li><a href="index.php?action=listActors">Acteurs</a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
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