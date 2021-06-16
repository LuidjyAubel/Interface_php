<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8"/>
     <title>Veille</title>
     <meta name="author" content="Luidjy Aubel">
  </head>
  <body>
  <h1> Veille technologique  </h1>
<?php
echo "<p> Ce texte est écrit par luidjy aubel, le 16/06/21 sur la page Veille</p>" ;
text();
function text(){
 //--- Connection au SGBDR 
 $DataBase = mysqli_connect('localhost:3308', 'root', '', 'interface');
 //--- Préparation de la requête
 $Requete = "Select * From veille ;" ;
 //--- Exécution de la requête (fin du script possible sur erreur ...)
 $Resultat = mysqli_query ( $DataBase, $Requete )  or  die(mysqli_error($DataBase) ) ;
 //--- Enumération des lignes du résultat de la requête
 while (  $ligne = mysqli_fetch_array($Resultat)  )
 {
   //--- Afficher une ligne du tableau HTML pour chaque enregistrement de la table 
   //echo "<p>" . $ligne['id']        . "</p>\n" ;
   $NomA = $ligne['NomA'];
   $dateAr = $ligne['dateAr'];
   $Page = $ligne['PageS'];
   echo "<p>" . nl2br($ligne['textA']) . "</p>\n" ;
   echo "\n\n";
 
 }
 //--- Libérer l'espace mémoire du résultat de la requête
// mysqli_free_result ( $Resultat ) ;
 //--- Déconnection de la base de données
 mysqli_close ( $DataBase ) ; 
}
?>
<a href="interface.php">écrire</a>
  </body>
</html>