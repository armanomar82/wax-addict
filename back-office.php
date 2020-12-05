<?php // lancement d'une session
include_once("session-init.php");
// vérification de la session
if (isset($_SESSION["user"]) and is_array($_SESSION["user"])) {
    // yes, alors bienvenue
    include("back-office--template.php");
} else { // bye
    header("Location: index.html#mauvaise-session");
    exit; // exit après une redirection
}
