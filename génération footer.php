<body>
<h1>Footer</h1>
<form action='?CMD=header' method='post'>
<label for='DEV'>Développeur :</label><br/>
<input type='text' name='dev' id='DEV' placeholder='saisir le nom du développeur'/><br/>
<input type='submit' name='valider'/><br/>
<?php
function footer(){
    echo "créer le footer de notre page<br/>";
    $dev =  $_POST['dev'];
    $date = date("Y");
    $fichier = "footer.php";
    //$fichier ="$Ftitle.html";
    file_put_contents($fichier, "<footer>",FILE_APPEND);
    file_put_contents($fichier, "<p>© $date $dev</p>", FILE_APPEND);
    file_put_contents($fichier, "</footer>",FILE_APPEND);
    file_put_contents($fichier, "</body>", FILE_APPEND);
    file_put_contents($fichier, "</html>",FILE_APPEND) ;
  }

  $CMD = "RIEN";
 

  if( count($_GET) != 0 )
  { if( ! isset($_GET['CMD']) )
      echo 'ERREUR CMD non définie' ;
  else
    { $CMD = $_GET['CMD'] ; //Appeler la commande demandée
      switch( $CMD )	
      { case 'header': footer(); break;
      default : echo 'ERREUR CMD inconnue '.$CMD ;
  } } }
?>