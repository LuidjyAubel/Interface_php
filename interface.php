<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8"/>
     <title>Interface web</title>
     <meta name="author" content="Luidjy Aubel">
  </head>
  <body>
      <form action="?CMD=NEW&CMD2=CO" method="post">
        <p>Nom de l'auteur</p><br/>
        <input type="text" name="auteur" placeholder="Nom de l'auteur"/><br/>
        <p>selection de la page</p>
        <select name="Page">
        <option value="" select>--Please choose an option--</option>
        <option value="blog">Blog</option>
        <option value="veille">veille</option>
        </select><br/>
        <p>Article</p><br/>
        <textarea name="text1" rows="9" cols="50" placeholder="Votre text ici !"></textarea><br/>
        <input type="submit" name="publier" value="Publier"/><br/>
      </form>
      <?php
        function article(){
        $auteur = $_POST['auteur'];
        $article = $_POST['text1'];
        $Page = $_POST['Page'];
        setlocale(LC_TIME, 'fra_fra');
        $dateAr = strftime('%d/%m/%y, %H:%M');
        echo "ce texte est écrit par $auteur, le $dateAr <br/>";
        echo "votre article est publier sur la page $Page de votre site<br/><br/>";
        echo nl2br($article);
        //echo "$article";
        }
        function connect (){
            $auteur = $_POST['auteur'];
            $article = $_POST['text1'];
            $Page = $_POST['Page'];
            $dateAr = strftime('%d/%m/%y, %H:%M');
         $DataBase = mysqli_connect('localhost:3308', 'root', '', 'interface');

         $Requete = "INSERT INTO article (id, NomA, PageS,textA, dateAr ) 
         VALUES (NULL,'$auteur','$Page', '$article', '$dateAr');";
        echo '<hr>REQUETE = ' .$Requete. '<hr>';
        $Resultat = mysqli_query ( $DataBase, $Requete )  or  die(mysqli_error($DataBase) ) ;
        //mysqli_free_result ( $Resultat ) ;
        mysqli_close ( $DataBase ) ;  
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

        $CMD2 = "RIEN";

        if( count($_GET) != 0 )
        { if( ! isset($_GET['CMD2']) )
            echo 'ERREUR CMD2 non définie' ;
          else
          { $CMD2 = $_GET['CMD2'] ;
            switch( $CMD2 )	
            { case 'CO' : connect();	break;
            default : echo 'ERREUR CMD2 inconnue '.$CMD ;
        } } }
    ?>
    <a href="Blog.php">Voir les messages</a>
  </body>
</html>