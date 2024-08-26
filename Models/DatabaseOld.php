<?php

class Database
{
    // Properties or Fields
    private $host;
    private $user;
    private $password;
    private $database;

    // Constructor
    public function __construct($host, $user, $password, $database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    // Getter and Setter methods

    // Methods
    public function checkConnection()
    {
        // Establish database connection
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);

        // Check database connection status
        if ($conn === false) {
            die('Connection error: ' . mysqli_connect_error());
        } else {
            $status = [
                'Hostname' => $this->host,
                'Username' => $this->user,
                'Password' => $this->password,
                'Database' => $this->database,
                'Status' => 'Connected',
                'Page URI' => $_SERVER['REQUEST_URI'],
                'Http Code' => http_response_code()
            ];
        }

        return $status; // Return the status array
    }
}

// Create a Dbase object
$db = new Database('localhost', 'root', '', 'Users');

// Create condition and call checkConnection method and capture the returned status
$status = $db->checkConnection() ? print 'Connected' : print 'Disconnected';

// Display the connection
// echo '<pre>';
// print_r($db);
// echo '</pre>';

// echo '<pre>';
// print_r($status);
// echo '</pre>';