<?php

  @date_default_timezone_set("Europe/Paris"); // fuseau horaire
  @setlocale(LC_TIME, "fr_FR.utf8","fra"); // jours et mois en français
  $dateDuJour = strftime("%A %d %B %Y");
  $pathJsonProducts = "conf/products.json";
  $contentJsonProducts  = file_get_contents($pathJsonProducts);
  $arrayContentJsonProducts   = json_decode($contentJsonProducts, true);
  $arrayLength = count($arrayContentJsonProducts);

?><!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>wax-addict — boutique officielle</title>
  <meta name="description" content="Bienvenue dans la boutique privée “Wax-Addict”. Retrouvez notre toute dernière sélection de tissus africains hauts de gamme.">
  <link rel="stylesheet" href="assets/style.css">
</head>

<body class="back-office">
  <header><h2>wax-addict</h2></header>
  <main>
    <h2>Bienvenue dans votre espace privé</h2>
    <p>Voici les produits disponibles en ce <?php echo $dateDuJour; ?> :</p>
    <div class="container">
      <?php
      for ($i=0; $i<$arrayLength; $i++) {
        echo("<div class='produit'>");
        $arrayContentJsonProductsProperties = $arrayContentJsonProducts[$i];
        $nomAlternatifArray = $arrayContentJsonProductsProperties['nom alternatif'];
        
        echo("<h2 class='titre'>".$arrayContentJsonProductsProperties['nom']."</h2>");
        echo("<p class='longueur'>Longueur en yards : ".$arrayContentJsonProductsProperties['longueur']."</p>");
        echo("<p class='prix'>Prix : ".$arrayContentJsonProductsProperties['prix']."€</p>");
        echo("<p class='altnom'>Noms alternatifs : ".$nomAlternatifArray."</p>");
        echo("<a href='#popup".$i."'><img class='imgWax' src='".$arrayContentJsonProductsProperties['image']."'></a>");
        echo("</div>");
        echo("<div id='popup".$i."' class='overlay'><a class='close' href='#'>&times;</a><img src='".$arrayContentJsonProductsProperties['image']."'></div>");
      }
      ?>
    </div>
  </main>
  <footer><a href="logout.php">déconnexion</a></footer>
</body>

</html>