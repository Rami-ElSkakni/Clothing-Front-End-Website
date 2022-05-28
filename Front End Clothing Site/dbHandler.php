<?php
$servername = "localhost";
$username = "ChilliFries";
$password = "password";
$dbname = "newdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "CREATE TABLE Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
    )";
    if ($conn->query($sql) === TRUE) {
      }
      
      // sql to create table
      $sql2 = "CREATE TABLE msgs ( 
         id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(30) NOT NULL,
         email VARCHAR(30) NOT NULL,
         subject VARCHAR(30) NOT NULL,
         body VARCHAR(250) ) NOT NULL";
      if ($conn->query($sql) === TRUE) {
      }
      
?>