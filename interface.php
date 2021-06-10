<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8"/>
     <title>Interface web</title>
     <meta name="author" content="Luidjy Aubel">
  </head>
  <body>
      <form action="?CMD=NEW" method="post">
        <p>Nom de l'auteur</p><br/>
        <input type="text" name="auteur" placeholder="Nom de l'auteur"/><br/>
        <p>Article</p><br/>
        <textarea name="text1" rows="9" cols="50" placeholder="Votre text ici !"></textarea><br/>
        <input type="submit" name="publier" value="Publier"/><br/>
      </form>
      <?php
        function article(){
        $auteur = $_POST['auteur'];
        $article = $_POST['text1'];
        setlocale(LC_TIME, 'fra_fra');
        $dateAr = strftime('%d/%m/%y, %H:%M');
        echo "ce texte est écrit par $auteur, le $dateAr <br/><br/>";
        echo "$article";
        }
        
        $CMD = "RIEN";

        if( count($_GET) != 0 )
        { if( ! isset($_GET['CMD']) )
            echo 'ERREUR CMD non définie' ;
          else
          { $CMD = $_GET['CMD'] ; //Appeler la commande demandée
            switch( $CMD )	
            { case 'NEW' : article();	break;
            default : echo 'ERREUR CMD inconnue '.$CMD ;
        } } }
    ?>
  </body>
</html>