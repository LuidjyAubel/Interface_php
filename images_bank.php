<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8"/>
     <title>Banque d'image du dossier upload</title>
     <meta name="author" content="Luidjy Aubel">
  </head>
  <body>
  <h1> Banque d'image pour l'interface  </h1>
<?php

$dir    = 'upload';
$files1 = scandir($dir);
//print_r($files1);
echo "<table border=1>";
foreach ($files1 as $key => $value)	// scanner répertoire
{
echo "<tr>" ;		// traitement normal pour un fichier

if( $value == '.' )  continue;   // ne rien faire
else if( $value == '..' ) continue;

//echo "fichier : $value <br/>";
$dir = $dir."/".$value;
  echo"<tr>";
  echo "<td><img src='".$dir."' alt='image' style='width: 100px; height: 100px;'/></td>";
  echo "<td><p>nom de l'image : $value</p></td>";
  echo "<td><p>chemin d'accès de l'image par rapport au dossier courrant : $dir</p><br/>";
  echo "</tr>";
  $dir    = 'upload';
}
echo "</table>";
?>
 <a href="Blog.php">Voir les messages du blog</a><br/>
    <a href="images.php">Pour upload des images</a><br/>
    <a href="interface.php">écrire</a>
    <a href="veille.php">Voir la veille</a>
  </body>
</html>