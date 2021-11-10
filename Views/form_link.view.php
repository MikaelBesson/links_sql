<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/asset/style.css">
    <title>Ajouter un lien</title>
</head>
<body>
<div class="content">

    <form action="/index.php?ctrl=add_link" method="post">
        <fieldset>
            <legend>Entrez votre lien : <?= $_SESSION['user']->getPrenom() ?> </legend>
            <label for="title">Titre du lien :</label><br>
            <input type="text" name="title" id="title"><br>
            <label for="href">Lien valide :</label><br>
            <input type="text" name="href" id="href"><br>

            <input type="radio" value="_blank" name="target" id="blank">
            <label for="blank">_blank</label>
            <input type="radio" value="_parent" name="target" id="parent">
            <label for="parent">_parent</label>
            <input type="radio" value="_self" name="target" id="self">
            <label for="self">_self</label>
            <input type="radio" value="_top" name="target" id="top">

            <label for="top">_top</label><br>
            <label for="name">Nom :</label><br>
            <input type="text" name="name" id="name"><br><br>
            <a href="/index.php?ctrl=home">Retour a l'acceuil</a>
            <input type="submit" value="Envoyer" id="submit">
        </fieldset>
    </form>

</div>

</body>
</html>