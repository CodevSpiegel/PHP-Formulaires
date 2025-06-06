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
</head>

<body>
    <form action="traitement.php" method="POST">
        <div>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" autofocus value="antho" required minlength="2">
            <?php if ($error === "pseudo") echo afficherErreur($_GET["error"]); ?>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="antho@antho.com" required>
            <?php if ($error === "email") echo afficherErreur("email", $_GET["error"]); ?>
        </div>
        <div>
            <label for="pass">Mot de passe</label>
            <input type="password" name="pass" id="pass" required minlength="4">
        </div>
        <div>
            <label for="confirm_pass">Confirmer Mot de passe</label>
            <input type="password" name="confirm_pass" id="confirm_pass" required minlength="4">
            <?php if ($error === "pass") echo afficherErreur("pass", $_GET["error"]); ?>
        </div>
        <div>
            <input type="submit" name="submit" value="S'inscrire">
        </div>
    </form>
</body>

</html>