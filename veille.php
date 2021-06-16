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
   echo "<p> Ce texte est écrit par ".$ligne['NomA'].", le ".$ligne['dateAr']." sur la page ".$ligne['PageS']."</p>" ;
   echo "<p>" . nl2br($ligne['textA']) . "</p>\n" ;
   echo "\n\n";
 
 }
 //--- Libérer l'espace mémoire du résultat de la requête
// mysqli_free_result ( $Resultat ) ;
 //--- Déconnection de la base de données
 mysqli_close ( $DataBase ) ;  

 echo "<table cellspacing=0 cellpadding=0 border=1 align='center'>\n";
  echo "<tr><th> Nom </th></tr>\n";
 $dir    = 'upload';
$files1 = scandir($dir);
//print_r($files1);
foreach ($files1 as $key => $value)	// scanner répertoire
{
echo "<tr>" ;		// traitement normal pour un fichier

echo "<td>". $value . "</td>" ;
  echo "</tr>\n";

  if ($value == "1.jpg"){
    echo "$files1";
  }
}
echo "</table>\n";
$curdir = getcwd();
$rt = dirname('upload');
$curdir = $curdir."/".$rt;
echo "$curdir <br/>";
?>
<a href="interface.php">écrire</a>
  </body>
</html>