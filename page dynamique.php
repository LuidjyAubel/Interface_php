<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8"/>
     <title>page</title>
     <meta name="author" content="Luidjy Aubel">
  </head>
  <body>
    <?php
    function BTN1(){
        echo "<button><a href='?CMD=ADD'>+</a><td></button><br/>";
    }
    function divCont(){
      echo "<div>";
      echo "Le switch fonctionne"; // debug
      echo "<button><a href='?CMD=ADD'>+</a><td></button><br/>"
      echo "</div>";
      BTN1();
    }
    function HTMLFICH(){
      echo "créer et éditer un fichier HTML";
      $fichier = $_POST['NomP'].".html";
     file_put_contents($fichier, "<!doctype html>",FILE_APPEND) ;
	   file_put_contents($fichier, "<html>",FILE_APPEND) ;
	   file_put_contents($fichier, "<head>",FILE_APPEND) ;
	   file_put_contents($fichier, "$metadata",FILE_APPEND) ;
	   file_put_contents($fichier, "</head>",FILE_APPEND) ;
	   file_put_contents($fichier, "<body>",FILE_APPEND) ;
	   file_put_contents($fichier, "$Contenu",FILE_APPEND) ;
	   file_put_contents($fichier, "</body>",FILE_APPEND) ;
	   file_put_contents($fichier, "</html>",FILE_APPEND) ;
    }

    $CMD = "RIEN";
   

    if( count($_GET) != 0 )
    { if( ! isset($_GET['CMD']) )
        echo 'ERREUR CMD non définie' ;
    else
      { $CMD = $_GET['CMD'] ; //Appeler la commande demandée
        switch( $CMD )	
        { case 'ADD' : divCont();	break;
          case 'HTML' : HTMLFICH(); break;
        default : echo 'ERREUR CMD inconnue '.$CMD ;
    } } }

    if ($CMD != "ADD")
    BTN1();	// Afficher le contenu à chaque fois !

    ?>
    <a href="images_bank.php">Voir les images du dossier upload</a><br/>
    <a href="interface.php">Publier sur le Blog ou la veille</a><br/>
    <a href="Blog.php">Voir les messages du blog</a><br/>
    <a href="images.php">Pour upload des images</a><br/>
    <a href="veille.php">Voir la veille</a>
  </body>
</html>