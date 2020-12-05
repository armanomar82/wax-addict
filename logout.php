<?php

  // lancement d'une session
  include_once("session-init.php");

  // on nettoie tout bien proprement
  if (!empty($_SESSION)) $_SESSION = []; // tableau vidé
  if (isset($_COOKIE[session_name()])) setcookie(session_name(), "", time()-1, "/"); // cookie viré
  session_destroy();

  // bye
  header("Location: index.html#deconnexion");
  exit; // exit après une redirection

?>