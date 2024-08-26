<?php

require('../Models/Database.php');
require('../Controllers/Register.Controller.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   // Get the input fields or properties
   $name = $_POST['name'] ?? null;
   $password = $_POST['password'] ?? null;

   // Create an instance of class Register and bind the parameters
   $register = new Register($name, $password);

   // Call the methods or function
   $register->processUserData();

}