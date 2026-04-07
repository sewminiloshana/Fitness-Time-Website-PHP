<?php

$name = "localhost";
$username = "root";
$password ="";
$dbname = "my_gim"


$conn = new mysqli($name, $username, $password, $dbname);

if($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
echo "Database connected successfully";


?>