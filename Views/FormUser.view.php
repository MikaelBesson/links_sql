
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asset/style.css">
    <title>Ajouter un Utilisateur</title>
</head>
<body>
<div class="content">

    <form action="/index.php?ctrl=addUser" method="post">
        <fieldset>
            <legend>Connection/Inscription :</legend>
            <label for="nom">Votre nom :</label><br>
            <input type="text" name="nom" id="nom" title="Entrez votre nom"><br>
            <label for="prenom">Votre prenom :</label><br>
            <input type="text" name="prenom" id="prenom" title="Entrez votre prenom"><br>
            <label for="mail">Votre adresse mail :</label><br>
            <input type="email" name="mail" id="mail" title="Entrez votre mail"><br>
            <label for="pass">Votre password :</label><br>
            <input type="password" name="pass" id="pass" title="Entrez votre password"><br><br>


            <a href="/index.php">Retour a l'acceuil</a>
            <input type="submit" value="Envoyer" id="submit">
        </fieldset>
    </form>

</div>

</body>
</html>