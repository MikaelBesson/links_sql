
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
    <a href="/index.php?ctrl=FormLink"><i class="fas fa-plus-square"> Ajouter un lien</i></a>
    <a href="/index.php?ctrl=FormUser"><i class="fas fa-user">Connection</i></a>
</div>
<?php
foreach ($data as $link){ ?>
    <div id="block">
        <div class="cases">
            <div class="in_cases">
                <a href="<?=$link->getHref()?>" target="<?=$link->getTarget()?>" title="<?=$link->getTitle()?>"><?=$link->getName()?></a>
            </div>
        </div>
    </div>
<?php }
?>

</body>
</html>
