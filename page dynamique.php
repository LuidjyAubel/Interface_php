<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8"/>
     <title>page</title>
     <meta name="author" content="Luidjy Aubel">
  </head>
  <body>
  <form action="?CMD=HTML" method="post">
        <p>Nom de l'auteur</p>
        <input type="text" name="author" placeholder="Nom de l'auteur"/><br/>
        <p>Nom du fichier</p>
        <input type="text" name="Ftitle" placeholder="Nom du fichier"/><br/>
        <p>titre de la page</p>
        <input type="text" name="Ptitle" placeholder="titre de la page"/><br/>
        <p>Texte</p>
        <textarea name="text1" rows="9" cols="50" placeholder="Votre text ici !" require></textarea><br/>
        <p> Ajouter une image</p>
        <input type="checkbox" name="image" value="image"><br/>
        <input type="submit" name="publier" value="Publier"/><br/>
      </form>
    <?php
    function HTMLFICH(){
      echo "créer un fichier HTML<br/>";
      $Ptitle = $_POST['Ptitle'];
      $author = $_POST['author'];
      $Ftitle = $_POST['Ftitle'];
      $image =  $_POST['image'];
      $curdir = scandir($Nomdir);
      for ($curdir == $imageC2){
        $imageC = "<img src='".$imageN."'>";
      }
      $Contenu = "<p>".$_POST['text1']."</p>";
      $metadata = "<meta charset='utf-8'/>
      <title>$Ptitle</title>
      <meta name='author' content='$author'>";
      $fichier ="$Ftitle.html";
     file_put_contents($fichier, "<!doctype html>",FILE_APPEND) ;
	   file_put_contents($fichier, "<html>",FILE_APPEND) ;
	   file_put_contents($fichier, "<head>",FILE_APPEND) ;
	   file_put_contents($fichier, "$metadata",FILE_APPEND);
	   file_put_contents($fichier, "</head>",FILE_APPEND) ;
	   file_put_contents($fichier, "<body>",FILE_APPEND) ;
	   file_put_contents($fichier, nl2br($Contenu),FILE_APPEND) ;
     if ($image == true){
      file_put_contents($fichier, $imageC,FILE_APPEND) ;
     }
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
        { case 'HTML' : HTMLFICH(); break;
        default : echo 'ERREUR CMD inconnue '.$CMD ;
    } } }
    ?>
    <a href="images_bank.php">Voir les images du dossier upload</a><br/>
    <a href="interface.php">Publier sur le Blog ou la veille</a><br/>
    <a href="Blog.php">Voir les messages du blog</a><br/>
    <a href="images.php">Pour upload des images</a><br/>
    <a href="veille.php">Voir la veille</a>
  </body>
</html>