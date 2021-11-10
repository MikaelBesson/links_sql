<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/asset/style.css">
    <script src="https://kit.fontawesome.com/940412168c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/asset/style.css">
    <title>Links Handler</title>
</head>
<body>
<div id="lien">
    <a href="/index.php?ctrl=form_link"><i class="fas fa-plus-square"> Ajouter un lien</i></a>
    <a href="/index.php?ctrl=mail"><i class="fas fa-envelope"> Nous contactez</i></a>
    <?php
    if (isset($_SESSION['user'])) {
        echo 'Bienvenue : ' . $_SESSION['user']->getPrenom(); ?>
        <a href="/index.php?ctrl=user_disconnect"><i class="fas fa-times-circle"> Deconnection</i></a><?php
    }
    ?>
    <a href="/index.php?ctrl=form_loggin"><i class="fas fa-user"> Connection</i></a>
    <a href="/index.php?ctrl=form_user"><i class="fas fa-user"> Inscription</i></a>

</div>
<div id="grille">
    <?php
    foreach ($data as $link) { ?>
        <div id="block">
            <div class="cases">
                <img src="/asset/img/wip.png" alt="image work in progres" height="60%">
                <div class="in_cases">
                    <a id="lienTitre" href="<?= $link->getHref() ?>" target="<?= $link->getTarget() ?>"
                       title="<?= $link->getTitle() ?>"><?= $link->getName() ?></a><br>
                    <div class="admin">
                        <a id="edit" href="/index.php?ctrl=form_edit&id=<?= $link->getId() ?>">Editer</a>
                        <a id="delete" href="/index.php?ctrl=delete_link&id=<?= $link->getId() ?>">Suprimer</a>
                    </div>

                </div>
            </div>
        </div> <?php
    }
    ?>
</div>


</body>
</html>
