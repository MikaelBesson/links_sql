<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asset/style.css">
    <title>Connection</title>
</head>
<body>
    <div class="content">

        <form action="index.php?ctrl=Loggin" method="post">
            <fieldset>
                <legend>Connection :</legend>
                <label for="pass">Votre password :</label><br>
                <input type="password" name="pass" id="pass" title="Entrez votre password"><br><br>

                <label for="mail">Votre Mail :</label><br>
                <input type="email" name="mail" id="mail" title="Entrez votre mail"><br><br>

                <a href="index.php?ctrl=home">Retour a l'acceuil</a><br>
                <a href="index.php?ctrl=FormUser">Inscription</a>
                <input type="submit" value="Envoyer" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>
