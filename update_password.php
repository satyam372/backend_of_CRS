<?php


include 'connection.php';

$password = isset($_POST['password']) ? $_POST['password'] : '';
$emp_id = isset($_POST['emp_id']) ? $_POST['emp_id'] : '';

$sql = "UPDATE logg SET pass = '$password' WHERE emp_id = '$emp_id'";
$query = mysqli_query($connect, $sql);

if ($query) {
    echo 'success';
} else {
    echo 'error';
}
?>
