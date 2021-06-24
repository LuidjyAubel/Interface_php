<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8"/>
     <title>Interface web image</title>
     <meta name="author" content="Luidjy Aubel">
  </head>
  <body>
  <center>  <h1 align="center">Upload</h1>
        
            <form action="images.php" method="POST" enctype="multipart/form-data">
                <label for="file">Fichier</label>
                <input type="file" name="file">
                <button type="submit">Enregistrer</button>
                <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .gif, .png, .pdf, .css , .html sont autorisés</p>
            </form>
        
            <h2>fichier Upload :</h2>
            <?php
        //var_dump($_POST);
        var_dump($_FILES);
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_FILES['file'])){
            $tmpName = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $error = $_FILES['file']['error'];
        }
        
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
         $maxsize = 5 * 1024 * 1024* 1024;
                if($size > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");
        
        //Tableau des extensions que l'on accepte
        $extensions = ['jpg', 'png', 'jpeg', 'gif', 'pdf', 'css', 'html'];
        if(in_array($extension, $extensions)){
                        move_uploaded_file($tmpName, './upload/'.$name);
                        echo "Votre fichier a été téléchargé avec succès.<br/>";
                $_FILES['file'] = null;
          }
          else{
            echo "Mauvaise extension";
        }
        
        }

        ?>
        <a href="images_bank.php">Voir les images du dossier upload</a><br/>
        <a href="Blog.php">Voir les messages du blog</a><br/>
        <a href="veille.php">Voir la veille</a>
  </body>
</html>