<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8"/>
     <title>Blog</title>
     <meta name="author" content="Luidjy Aubel">
  </head>
  <body>
  <h1> Blog Guitare  </h1>
<?php
  $cpt = 0;
 //--- Connection au SGBDR 
 $DataBase = mysqli_connect('localhost:3308', 'root', '', 'interface');
 //--- Préparation de la requête
 $Requete = "Select * From article ;" ;
 //--- Exécution de la requête (fin du script possible sur erreur ...)
 $Resultat = mysqli_query ( $DataBase, $Requete )  or  die(mysqli_error($DataBase) ) ;
 //--- Enumération des lignes du résultat de la requête
 while (  $ligne = mysqli_fetch_array($Resultat)  )
 {
   //--- Afficher une ligne du tableau HTML pour chaque enregistrement de la table 
   //echo "<p>" . $ligne['id']        . "</p>\n" ;
   echo "<div class='".$cpt."'>";
   echo "<p> Ce texte est écrit par ".$ligne['NomA'].", le ".$ligne['dateAr']." sur la page ".$ligne['PageS']."</p>" ;
   echo "<p style='color:".$ligne['colorTex']."'>" . nl2br($ligne['textA']) . "</p>\n" ;
   echo "\n\n";
   if (! empty($ligne['Iname']) && (isset($ligne['Iname']))){
    $dir    = 'upload';
  $files1 = scandir($dir);
  $dir = $dir."/".$ligne['Iname'];
  //echo "fichier : $dir <br/>";
  echo "<img src='".$dir."' alt='image' style='width: 100px; height: 100px;'/>";
  $dir    = 'upload';
   }
   }
   echo "</div>";
   $cpt = $cpt + 1;
 
 //--- Libérer l'espace mémoire du résultat de la requête
// mysqli_free_result ( $Resultat ) ;
 //--- Déconnection de la base de données
 mysqli_close ( $DataBase ) ;  
?>
    <a href="images.php">Pour upload des images</a><br/>
    <a href="images_bank.php">Voir les images du dossier upload</a><br/>
    <a href="interface.php">écrire</a><br/>
    <a href="veille.php">Voir la veille</a>
  </body>
</html>