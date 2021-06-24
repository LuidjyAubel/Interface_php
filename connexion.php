<html>
<head>
  <title>	Confirmation	</title>
</head>
<body>
<hr><br>
<?php
//--- Connection au SGBDR 
$Username = $_GET['Username'] ;
$Password = $_GET['Password'] ; 

$DataBase = mysqli_connect ( "localhost:3308" , "root" , "" ) ;

//--- Ouverture de la base de données
mysqli_select_db ( $DataBase, "bd04" ) ;

//--- Préparation de la requête
$Requete = "Select * From utilisateur where UserName = '$Username' AND Password = '$Password';" ;
//--- Exécution de la requête (fin du script possible sur erreur ...)
$Resultat = mysqli_query ( $DataBase, $Requete )  or  die(mysqli_error($DataBase) ) ;

if ($ligne = mysqli_fetch_array($Resultat)){$connexionOK = true;} 
else $connexionOK = false; 


//--- Libérer l'espace mémoire du résultat de la requête
mysqli_free_result ( $Resultat ) ;
//--- Déconnection de la base de données
mysqli_close ( $DataBase ) ;  

session_start();
if ( $connexionOK)
{
    $_SESSION['Username'] = $Username;
    $_SESSION['admin'] = $ligne['admin'];
    echo "Connection Acceptée <br>";
    if ($_SESSION['admin'] == true){
      echo "<a href='Ajouter.php'>Ajouter des personnes à la base</a><br>";
      echo "Vous êtes administrateur";
    }
    else  if ($_SESSION['admin'] == false){
      echo "Vous êtes un utilisateur<br>";
    }
  echo "<form action='Afficher.php' >
    <input type=submit value='Suivant' >
    </form>";
    echo "
    <form action='co.html' >
    <input type=submit value='Retour en Arrière' >
    </form>";
}
else
{
    echo "Connection Refusée";
    echo "
    <form action='co.html' >
    <input type=submit value='Retour en Arrière' >
    </form>";
    session_destroy();
}

?>
<br><br>
<hr>
</BODY>
</HTML>