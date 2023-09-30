<?php

include 'connection.php';
$login=false;
$showerror=false;

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = ($_POST['password']); // Using md5 for password hashing is not recommended for security reasons.

    $sqlQuery = "SELECT * FROM logg WHERE username='$username' AND password='$password'";

    $result = $connect->query($sqlQuery);
    $result=mysqli_query($connect,$sqlQuery);
    $num=mysqli_num_rows($result);

    if ($num==1) {
        $login=true;
        session_start();
        $_SESSION['$username']=$username;
        $_SESSION['loggedin']=true;
        echo("success");

    } else {
        $showerror= "Non-Success";
    }
}

?>
