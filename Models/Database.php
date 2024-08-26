<?php
session_start();
class Database
{
   // Properties or Fields
   private $hostname = 'localhost';
   private $database = 'users-oop';
   private $username = 'root';
   private $password = '';

   // Methods
   protected function connect()
   {
      try {
         // Set PDO connection information
         $conn = new PDO("mysql:host=" . $this->hostname . ";dbname=" . $this->database, $this->username, $this->password);
         // Set the PDO error mode to exception
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         return $conn;
      } catch (PDOException $e) {
         echo "Connection failed: " . $e->getMessage();
      }
   }

   // Create public method to access the protected method
   public function getDatabaseInfo()
   {
      // Calls the protected method
      $this->connect();

      // Store and gather database connection and page information
      $databaseInfo = [
         'Hostname' => $this->hostname,
         'Database' => $this->database,
         'Username' => $this->username,
         'Password' => $this->password,
         'Status' => 'Connected',
         'Page URI' => $_SERVER['REQUEST_URI'], // Display the URI page title
         'Http Status' => http_response_code()
      ];

      // Use this code below for debugging purpose
      echo '<pre>';
      print_r($databaseInfo);
      echo '</pre>';
   }
}

// Create an instance of the Database class
$db = new Database();

// Call the getDatabaseInfo method
$db->getDatabaseInfo();
