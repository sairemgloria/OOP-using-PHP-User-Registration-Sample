<?php
require('Models/Database.php'); // Display the database connection purpose only. Comment this line after checking
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>OOP Register</title>
</head>

<body>

   <!-- Your Code -->
   <div>
      <fieldset>
         <legend>Sample Register Form:</legend>
         <form action="includes/Register.php" method="post">
            <?php require('includes/toast-notifcations.php'); ?>
            <br>
            <label for="name">Name : </label>
            <input type="text" name="name">
            <br><br>
            <label for="password">Password : </label>
            <input type="password" name="password">
            <br><br>
            <input type="submit" name="register" value="Register">
         </form>
      </fieldset>

   </div>

</body>

</html>