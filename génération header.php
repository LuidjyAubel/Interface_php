<body>
<h1>Header</h1>
<form action='?CMD=header' method='post'>
<label for='titleS'>titre du site</label><br/>
<input type='text' name='TitleS' id='titleS' placeholder='saisir le nom du site'/><br/>
<label for='typeM'>type de menu</label><br/>
<select name="Tmenu" id="typeM">
<option value="" selected>---Select an option---</option>
<option value="Principal">Principal</option>
<option value="Secondaire">Secondaire</option>
</select><br/>
<input type='submit' name='valider'/><br/>
<?php
function header1(){
    echo "créer les meta données de notre page<br/>";
    $titleS =  $_POST['TitleS'];
    $Tmenu = $_POST['Tmenu'];
    $Principal = array("Aceuil", "Article", "Test", "Contact");
    $fichier = "header.php";
    //$fichier ="$Ftitle.html";
    file_put_contents($fichier, "<body>",FILE_APPEND) ;
    file_put_contents($fichier, "<header>",FILE_APPEND) ;
    file_put_contents($fichier, "<h1 align='left'>$titleS</h1>",FILE_APPEND);
    file_put_contents($fichier, "<nav>", FILE_APPEND);
    if ($Tmenu == "Principal"){
      foreach ($Principal as $key => $value){
        file_put_contents($fichier, "<a href='".$key."'>$value</a>&nbsp;", FILE_APPEND);
      }
      echo "debug de la boucle de choix de menu";
    }
    //file_put_contents($fichier, "$Tmenu",FILE_APPEND);
    file_put_contents($fichier, "</nav>", FILE_APPEND);
    file_put_contents($fichier, "</header>",FILE_APPEND) ;
  }

  $CMD = "RIEN";
 

  if( count($_GET) != 0 )
  { if( ! isset($_GET['CMD']) )
      echo 'ERREUR CMD non définie' ;
  else
    { $CMD = $_GET['CMD'] ; //Appeler la commande demandée
      switch( $CMD )	
      { case 'header': header1(); break;
      default : echo 'ERREUR CMD inconnue '.$CMD ;
  } } }
?>