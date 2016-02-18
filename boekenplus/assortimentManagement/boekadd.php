<?php

session_start();
require '../includes/adminCheck.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP insertion</title>
  <link rel="stylesheet" href="../includes/style2.css" >
</head>
<body>
<?php
require_once('../includes/navigation.template.php')
?>

<div id="hmenu">
  <!--HTML Form -->
  <div >
    <div >
      <h1>Boek toevoegen</h1>
    </div>
    <form action="boekAddProcessing.php" method="post">
      <!-- Method can be set as POST for hiding values in URL-->
      <label for="titel">Titel:</label>
      <input type="text" id="titel" name="titel" ><br><br>


      <label for="auteur">Auteur:</label>
      <input type="text" id="auteur" name="auteur" >
      <br><br>

      <label for="genre">Genre:</label>
      <input type="text" id="genre" name="genre"><br><br>


      <label for="jaar">Jaar:</label>
      <input type="text" id="jaar" name="jaar">
      <br><br>

      <label for="voorraad">Voorraad:</label>
      <input type="text" id="voorraad" name="voorraad"><br><br>


      <label for="inhoud">Beschrijving:</label>
      <input type="text" id="inhoud" name="inhoud">
      <br><br>

      <input name="add" type="submit" id="add"  value='Voeg boek toe' />
      <br>

    </form>
  </div>
</div>

</body>
</html>
