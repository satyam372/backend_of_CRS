<?php

include 'connection.php';

$problem = isset($_POST['problem']) ? $_POST['problem'] : '';
$time_date=isset($_POST['time_date']) ? $_POST['time_date'] : '';
$assigned_engineer=isset($_POST['assigned_engineer']) ? $_POST['assigned_engineer'] : '';


$insert = "INSERT INTO assigntwo (problem,time_date,assigned_engineer) VALUES ('$problem','$time_date','$assigned_engineer')";

$query = mysqli_query($connect, $insert);

if ($query) {
    echo "success";
} else {
    echo "error";
}

?>
