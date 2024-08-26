<?php

class Register extends Database
{
   // Properties or Fields
   private $name;
   private $password;

   // Methods
   public function __construct($name, $password)
   {
      $this->name = $name;
      $this->password = $password;
   }

   public function processUserData()
   {
      // Check for empty fields first
      $emptyFields = $this->checkEmptyFields();

      // If no fields are empty, proceed with the insert query
      if (empty($emptyFields)) {
         $this->insertUser();
      }
   }

   private function checkEmptyFields()
   {
      // Get the input fields or properties
      $fields = [
         'name' => $this->name,
         'password' => $this->password
      ];

      $emptyFields = []; // Array to store empty fields

      // Loop the array $fields to get the input field name and this value
      foreach ($fields as $field => $value) {
         // Create validation for checking of empty fields
         if (empty($value)) {
            $emptyFields[] = $field;
         }
      }

      // Create condition and display the validation
      if (count($emptyFields) == count($fields)) {
         // Display all fields empty
         // echo 'All fields are empty';
         // echo '<br><a href="../register.php">Go Back</a>';
         $_SESSION['allFieldsEmpty'] = 'All fields are empty';
         header('Location: ../register.php');
         die();
      } elseif (!empty($emptyFields)) {
         // Display the fields that are empty
         echo 'Empty fields are: <strong>' . implode(", ", $emptyFields) . '</strong>';
         echo '<br><a href="../register.php">Go Back</a>';
         $_SESSION['emptyField'] = 'Empty fields are: <strong style="color:orange;">' . implode(", ", $emptyFields) . '</strong>';
         header('Location: ../register.php');
         die();
      }

      return $emptyFields; // Return empty fields so the calling method can decide what to do
   }

   private function insertUser()
   {
      // SQL Insert Query
      $query = "INSERT INTO `users` (`name`, `password`) VALUES (:name, :password);";

      // Prepare the statement
      $stmt = $this->connect()->prepare($query);

      // Bind the parameters to prevent SQL injection
      $stmt->bindParam(":name", $this->name);
      $stmt->bindParam(":password", $this->password);

      // Execute the statement
      if ($stmt->execute() == FALSE) {
         // Create error handler
         die('Error: ' . implode(", ", $stmt->errorInfo()));
      } else {
         // Return success message if the statement and query are successful
         // echo 'Success: User data inserted';
         // echo '<br>';
         // echo '<a href="../register.php">Go Back</a>';
         $_SESSION['success'] = 'Registration successful';
         header('Location: ../register.php');
         die();
      }
   }
}
