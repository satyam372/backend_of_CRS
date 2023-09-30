<?php

include 'connection.php';


// if (isset($_POST['username']) && isset($_POST['password'])) {
//     $username = $_POST['username'];
//     $password = md5($_POST['password']);

//     $sqlQuery = "INSERT INTO logg SET username='$username', pass='$password'";
//     $result = $connect->query($sqlQuery);

//     if ($result) {
//         echo json_encode(array("success" => true));
//     } else {
//         echo json_encode(array("success" => false, "error" => $connect->error));
//     }
// }

$username=$_POST['username'];
$password=$_POST['password'];

$sql="SELECT * FROM logg WHERE username='".$username."'AND password='".$password."'";

$result=mysqli_query($connect,$sql);
$count=mysqli_num_rows($result);

if ($count == 1) {
    echo json_encode(array("response" => "error"));
} else {
    $insert = "INSERT INTO logg(username, password) VALUES ('".$username."', '".$password."')";
    $query = mysqli_query($connect, $insert);
    if ($query) {
        echo json_encode(array("response" => "success"));
    }
}


?>

