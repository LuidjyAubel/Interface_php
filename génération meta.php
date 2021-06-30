<body>
<h1>Meta données</h1>
<form action='?CMD=meta' method='post'>
<label for='encoding'>encoding</label><br/>
<select name="encode" id="encoding">
<option value="" selected>---Select an option---</option>
<option value="UTF-8">UTF-8</option>
<option value="ISO-8859-1">ISO-8859-1</option>
</select><br/>
<label for='author'>author</label><br/>
<input type='text' name='auteur' id='author' placeholder='écriver le nom de l&apos;auteur'/><br/>
<label for='titleS'>titre du site</label><br/>
<input type='text' name='TitleS' id='titleS' placeholder='saisir le nom du site'/><br/>
<label for='desc'>description</label><br/>
<textarea name="text1" rows="9" cols="50" placeholder="Votre text ici !" require></textarea><br/>
<input type='submit' name='valider'/>
<?php
function head(){
    echo "créer les meta données de notre page<br/>";
    $encode = $_POST['encode'];
    $author = $_POST['auteur'];
    $desc = $_POST['text1'];
    $titleS =  $_POST['TitleS'];
    $desc2 = htmlspecialchars($desc, ENT_QUOTES);
    $fichier = "meta.php";
    //$fichier ="$Ftitle.html";
    file_put_contents($fichier, "<!doctype html>",FILE_APPEND) ;
    file_put_contents($fichier, "<html>",FILE_APPEND) ;
    file_put_contents($fichier, "<head>",FILE_APPEND) ;
    file_put_contents($fichier, "<meta charset='$encode'/>",FILE_APPEND);
    file_put_contents($fichier, "<meta name='author' content='$author'",FILE_APPEND);
    file_put_contents($fichier, "<meta name='viewport' content='width=device-width, initial-scale=1.0'>",FILE_APPEND);
    file_put_contents($fichier, "<meta name='robots' content='index, follow'/>", FILE_APPEND);
    file_put_contents($fichier, "<meta name='description' content='$desc2'/>", FILE_APPEND);
    file_put_contents($fichier, "<title>$titleS</title>",FILE_APPEND);
    file_put_contents($fichier, "</head>",FILE_APPEND) ;
  }

  $CMD = "RIEN";
 

  if( count($_GET) != 0 )
  { if( ! isset($_GET['CMD']) )
      echo 'ERREUR CMD non définie' ;
  else
    { $CMD = $_GET['CMD'] ; //Appeler la commande demandée
      switch( $CMD )	
      { case 'meta': head(); break;
      default : echo 'ERREUR CMD inconnue '.$CMD ;
  } } }
?>