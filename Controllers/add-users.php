<?php
require('../Models/conn.php');

if (isset($_POST['submit'])) {

    // properties or fields
    $name = $_POST['name'];
    $password = $_POST['password'];
    
    $sql = "INSERT INTO `users` (`name`, `password`) VALUE ('$name', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo '<script>console.log("True");</script>';
    } else {
        echo '<script>console.log("False");</script>';
    }
    
    $conn->close();
    
}