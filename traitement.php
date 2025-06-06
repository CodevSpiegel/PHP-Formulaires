<?php

// SI QUELQU'UN SE REND SUR CETTE PAGE AUTREMENT QU'EN POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ./index.php");
    die;
}

// ON VA VERIFIER SI L'UTILISATEUR PROVIENT BIEN DU FORMULAIRE
if (!isset($_POST["submit"])) {
    header("Location: ./index.php");
    die;
}

// L'UTILISATEUR EST BIENVEILLANT
// SI LE PSEUDO FAIT MOINS DE 2 CARACTERES
if (strlen(trim($_POST['pseudo'])) < 2) {
    header("Location: ./index.php?error=pseudo");
    die;
}
// SI L'EMAIL N'EST PAS UN EMAIL
$email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
if (!$email) {
    header("Location: ./index.php?error=email");
    die;
}

// // SI LES MOTS DE PASSE NE CORRESPONDENT PAS OU SI INFERIEUR A 4 CARACTERES
// if ($_POST["pass"] != $_POST["confirm_pass"] || strlen(trim($_POST["pass"])) < 8) {
//     header("Location: ./index.php?error=pass");
//     die;
// }

// if (!preg_match('/[A-Z]/', $_POST["pass"])) {
//     header("Location: ./index.php?error=pass");
//     die;
// }

// if (!preg_match('/[0-9]/', $_POST["pass"])) {
//     header("Location: ./index.php?error=pass");
//     die;
// }

var_dump($_POST["pass"]);

// SI LES MOTS DE PASSE NE CORRESPONDENT PAS OU SI INFERIEUR A 8 CARACTERES
if ($_POST["pass"] == $_POST["confirm_pass"] && strlen(trim($_POST["pass"])) > 7) {
    $passLetters = str_split($_POST["pass"]);
    $uppercases = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "À", "É", "È", "Ù", "Ê", "Ô", "Ì", "Ï", "Ÿ", "Ç"];
    $numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    $checkUppercase = false;
    $checkNumber = false;

    foreach ($passLetters as $passLetter) {
        if (in_array($passLetter, $uppercases)) {
            echo "<p>Il y a une majuscule</p>";
            $checkUppercase = true;
            break;
        }
    }
    foreach ($passLetters as $passLetter) {
        if (in_array($passLetter, $numbers)) {
            echo "<p>Il y a un chiffre</p>";
            $checkNumber = true;
            break;
        }
    }
    if (!$checkUppercase || !$checkNumber) {
        header("Location: ./index.php?error=pass_sans_chiffres");
        die;
    }
} else {
    // SI LES MOTS DE PASSE NE CORRESPONDENT PAS OU SI INFERIEUR A 8 CARACTERES
    header("Location: ./index.php?error=pass");
    die;
}

echo "Bien joué !";