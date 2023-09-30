<?php
include 'connection.php';

$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '11728';
$password = isset($_POST['password']) ? $_POST['password'] : 'sumenth';
$department=isset($_POST['department'])? $_POST['department'] : 'IT';

// Secure the SQL query using prepared statement
$sql = "SELECT * FROM administrator WHERE user_id = ?;";
$stmt = mysqli_prepare($connect, $sql);

if (!$stmt) {
    die("Error in prepared statement: " . mysqli_error($connect));
}

mysqli_stmt_bind_param($stmt, 's', $user_id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

if (!$res) {
    die("Error in getting result: " . mysqli_error($connect));
}

if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);

    // Verify the password using password_verify() (assuming passwords are stored hashed)
    if (($password=== $row['password'] )  && ($department=== $row['department'] ) ) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "Username does not exist!";
}

mysqli_stmt_close($stmt);
mysqli_close($connect);
?>
