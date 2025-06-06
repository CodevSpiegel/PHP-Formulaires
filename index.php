<?php

function afficherErreur($type)
{
    if ($type === false) {
        return;
    }
    return match ($type) {
        "email" => "L'email n'est pas valide",
        "pseudo" => "Le pseudo n'est pas valide",
        "pass" => "Les mots de passe ne correspondent pas ou ne sont pas assez long",
        "file" => "Le fichier envoyé n'est pas valide",
    };
}
$error = $_GET["error"] ?? "";
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form inscription</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="traitement.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" autofocus value="antho" required minlength="2">
            <?php if ($error === "pseudo") echo afficherErreur($_GET["error"]); ?>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="antho@antho.com" required>
            <?php if ($error === "email") echo afficherErreur("email", $_GET["error"]); ?>
        </div>
        <div class="form-group">
            <label for="pass">Mot de passe</label>
            <input type="password" name="pass" id="pass" required minlength="4" value="fff777AAA">
        </div>
        <div class="form-group">
            <label for="confirm_pass">Confirmer Mot de passe</label>
            <input type="password" name="confirm_pass" id="confirm_pass" required minlength="4" value="fff777AAA">
            <?php if ($error === "pass") echo afficherErreur("pass", $_GET["error"]); ?>
        </div>
        <div class="form-group">
            <label for="file">Fichier à envoyer</label>
            <input type="file" name="uploadfile" id="uploadfile" accept=".png,.jpg,.jpeg,.gif,.webp,.avif">
            <?php if ($error === "file") echo afficherErreur("file", $_GET["error"]); ?>
        </div>
        <div class="form-group">
            <button name="submit">Valider</button>
        </div>
    </form>
</body>

</html>