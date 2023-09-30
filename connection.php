<?php

// // $host = "host=localhost";
// // $port = "port=5432";
// // $dbname = "dbname=postgres";
// // $credentials = "user=postgres password=satyam@4545";

// // $connectionString = "$host $port $dbname $credentials";
// // $db = pg_connect($connectionString);
// // if (!$db) {
// //     echo "error: unable to open database";
// // } else {
// //     echo "opened";
// // 

// $serverhost = "localhost:3307";
// $user = "root";
// $password = "";
// $database = "satyam";

// // Create a new MySQLi object and establish a connection
// $connect = new mysqli($serverhost, $user, $password, $database);

// // Check if the connection was successful
// if ($connect->connect_error) {
//     die("Connection failed: " . $connect->connect_error);
// }

// // Successful connection
// echo "Database connected successfully.";

// Perform database operations here...

// Close the connection



$serverhost = "localhost:3307";
$user = "root";
$password = "";
$database = "satyam";

// Create a new MySQLi object and establish a connection
$connect = new mysqli($serverhost, $user, $password, $database);

// Check if the connection was successful
if ($connect->connect_errno) {
    print( "database connection failed");
    exit();
}


// $username=$_POST['username'];
// $password=$_POST['password'];

// $sql="SELECT * FROM logg WHERE username='".$username."'AND password='".$password."'";

// $result=mysqli_query($connect,$sql);
// $count=mysqli_num_rows($result);

// if ($count == 1) {
//     echo json_encode(array("response" => "error"));
// } else {
//     $insert = "INSERT INTO logg(username, password) VALUES ('".$username."', '".$password."')";
//     $query = mysqli_query($connect, $insert);
//     if ($query) {
//         echo json_encode(array("response" => "success"));
//     }
// }

// Successful connection




?>




