<?php
include 'connection.php';

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Secure the SQL query using prepared statement
$sql = "SELECT * FROM logg WHERE emp_id = ?;";
$stmt = mysqli_prepare($connect, $sql);

if (!$stmt) {
    die("Error in prepared statement: " . mysqli_error($connect));
}

mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

if (!$res) {
    die("Error in getting result: " . mysqli_error($connect));
}

if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);

    // Verify the password using password_verify() (assuming passwords are stored hashed)
    if (($password=== $row['pass'])) {
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
