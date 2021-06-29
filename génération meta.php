<?php
echo "<h1>Meta données</h1>";
echo "<form action='?'>";
echo "<label for='encoding'>encoding</label><br/>";
echo '<select name="encode" id="encoding">';
echo '<option value="" selected>---Select an option---</option>';
echo '<option value="UTF-8">UTF-8</option>';
echo '<option value="ISO-8859-1">ISO-8859-1</option>';
echo '</select><br/>';
echo "<label for='author'>author</label><br/>";
echo "<input type='text' name='auteur' id='author' placeholder='écriver le nom de l auteur'/><br/>";
echo "<label for='desc'>description</label><br/>";
echo '<textarea name="text1" rows="9" cols="50" placeholder="Votre text ici !" require></textarea><br/>';
echo "<input type='submit' name='valider'/>";

$textarea = $_GET['text1'];
echo "$textarea<br/><br/>";
$new = htmlspecialchars($textarea, ENT_QUOTES);
echo $new."<br/>";

$new2 = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
echo $new2;

?>