<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asset/style.css">
    <title>Mail</title>
</head>
<body>
    <div class="content">
        <form action="/index.php?ctrl=sendMail" method="post">
            <fieldset>
                <legend>Messagerie :</legend><br>

                <label for="name">Votre Nom :</label><br>
                <input type="text" name="name" id="name" value="<?= $_SESSION['user']->getNom() ?>"><br><br>

                <label for="first_name">Votre prenom :</label><br>
                <input type="text" name="first_name" id="first_name" value="<?= $_SESSION['user']->getPrenom() ?>"><br><br>

                <label for="mail">Votre adresse mail :</label><br>
                <input type="email" name="mail" id="mail" value="<?= $_SESSION['user']->getMail() ?>"><br><br>

                <label for="message">Votre message :</label><br>
                <textarea name="message" id="message" cols="100" rows="5"></textarea><br><br>

                <a href="/index.php?ctrl=home">Retour a l'acceuil</a>
                <input type="submit" value="Envoyer" id="submit">
            </fieldset>
        </form>
    </div>

</body>
</html>
