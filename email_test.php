<?php

$email = "";
$msg_email = "";

if ( isset($_POST["email"])) {
    // SI L'EMAIL N'EST PAS UN EMAIL
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    if (!$email) {
        $msg_email = "Email invalide !";
    }
    else {
        $msg_email = "Email Valide !";
    }
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Email</title>
</head>

<body>
    <form action="" method="POST">
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= $email; ?>" required>
            <?= $msg_email; ?>
        </div>
        <div>
            <input type="submit" name="submit" value="Verifier">
        </div>
    </form>
</body>

</html>