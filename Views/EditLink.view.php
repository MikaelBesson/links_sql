<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asset/style.css">
    <title>Editer un lien</title>
</head>
<body>
<div class="content">

    <form action="/index.php?ctrl=editLink&id<?=$data->getId()?>" method="post">
        <fieldset>
            <legend>Moddifier le lien :</legend>
            <span>Titre du lien :<?= $data->getTitle() ?> </span>
            <input id="newTitle" type="text" name="newTitle" title="Nouveaux Titre" placeholder="Nouveaux titre ici" ><br><br>
            <span>Href du lien :<?= $data->getHref() ?></span>
            <input id="newHref" type="text" name="NewHref" title="Nouvelle Href" placeholder="Nouvelle Href ici"><br><br>
            <span>Target du lien :<?= $data->getTarget() ?></span> >>> <span>Nouvelle Target :</span>
            <input type="radio" value="_blank" name="target" id="blank">
            <label for="blank">_blank</label>
            <input type="radio" value="_parent" name="target" id="parent">
            <label for="parent">_parent</label>
            <input type="radio" value="_self" name="target" id="self">
            <label for="self">_self</label>
            <input type="radio" value="_top" name="target" id="top"><br><br>
            <span>Nom du lien :<?= $data->getName() ?></span>
            <input id="newName" type="text" name="newName" title="Nouveaux Nom du lien" placeholder="Nouveaux nom ici"><br><br>
            <a href="/index.php">Retour a l'acceuil</a>
            <input type="submit" value="Envoyer" id="submit">
        </fieldset>
    </form>
</div>

</body>
</html>
