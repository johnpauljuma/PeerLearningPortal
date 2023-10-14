<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
     // Define your database connection parameters
     $host = "localhost";
     $username = "root"; 
     $password = ""; 
     $database = "student"; 
 
     // Create a database connection
     $conn = mysqli_connect($host, $username, $password, $database);
 
     // Check if the connection was successful
     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
     }
?>