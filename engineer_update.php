<?php

include 'connection.php';

$complaint_id = isset($_POST['complaint_id']) ? $_POST['complaint_id'] : '1';
$complete = isset($_POST['complete']) ? $_POST['complete'] : '';
$Date = isset($_POST['Date']) ? $_POST['Date'] : '';

$sql="UPDATE it SET engine_status = '$complete' ,engine_complete_time='$Date' WHERE complaint_id = '$complaint_id'";
$query_one = mysqli_query($connect, $sql);

$sql_biomedical="UPDATE biomedical SET engine_status = '$complete' ,engine_complete_time='$Date' WHERE complaint_id = '$complaint_id'";
$query_biomedical = mysqli_query($connect, $sql_biomedical);

$sql_facility="UPDATE facility SET engine_status = '$complete' ,engine_complete_time='$Date' WHERE complaint_id = '$complaint_id'";
$query_facility = mysqli_query($connect, $sql_facility);

$sql_maintenance="UPDATE maintainance SET engine_status = '$complete' ,engine_complete_time='$Date' WHERE complaint_id = '$complaint_id'";
$query_maintenance = mysqli_query($connect, $sql_maintenance);

// Calculate the time difference for T2
$sql_get_dates = "SELECT engine_complete_time, admin_assign_time FROM it WHERE complaint_id = $complaint_id";
$result_dates = mysqli_query($connect, $sql_get_dates);
if ($result_dates && mysqli_num_rows($result_dates) > 0) {
    $row_dates = mysqli_fetch_assoc($result_dates);
    $admin_assign_time = $row_dates['admin_assign_time'];
    $engine_complete_time = $row_dates['engine_complete_time'];

    $datetime1 = new DateTime($admin_assign_time);
    $datetime2 = new DateTime($engine_complete_time);
    $interval = $datetime1->diff($datetime2);
    $time_difference = $interval->format('%H:%i:%s');

    // Update the "T2" column in the database
    $sql_update_t2 = "UPDATE it SET T2 = '$time_difference' WHERE complaint_id = $complaint_id";
    $query_update_t2 = mysqli_query($connect, $sql_update_t2);

    
} else {
    echo "No rows found for complaint_id = $complaint_id";
}










$sql_get_dates = "SELECT engine_complete_time, admin_assign_time FROM biomedical WHERE complaint_id = $complaint_id";
$result_dates = mysqli_query($connect, $sql_get_dates);
if ($result_dates && mysqli_num_rows($result_dates) > 0) {
    $row_dates = mysqli_fetch_assoc($result_dates);
    $admin_assign_time = $row_dates['admin_assign_time'];
    $engine_complete_time = $row_dates['engine_complete_time'];

    $datetime1 = new DateTime($admin_assign_time);
    $datetime2 = new DateTime($engine_complete_time);
    $interval = $datetime1->diff($datetime2);
    $time_difference = $interval->format('%H:%i:%s');

    // Update the "T2" column in the database
    $sql_update_t2 = "UPDATE biomedical SET T2 = '$time_difference' WHERE complaint_id = $complaint_id";
    $query_update_t2 = mysqli_query($connect, $sql_update_t2);

    
} else {
    echo "No rows found for complaint_id = $complaint_id";
}






$sql_get_dates = "SELECT engine_complete_time, admin_assign_time FROM maintainance WHERE complaint_id = $complaint_id";
$result_dates = mysqli_query($connect, $sql_get_dates);
if ($result_dates && mysqli_num_rows($result_dates) > 0) {
    $row_dates = mysqli_fetch_assoc($result_dates);
    $admin_assign_time = $row_dates['admin_assign_time'];
    $engine_complete_time = $row_dates['engine_complete_time'];

    $datetime1 = new DateTime($admin_assign_time);
    $datetime2 = new DateTime($engine_complete_time);
    $interval = $datetime1->diff($datetime2);
    $time_difference = $interval->format('%H:%i:%s');

    // Update the "T2" column in the database
    $sql_update_t2 = "UPDATE maintainance SET T2 = '$time_difference' WHERE complaint_id = $complaint_id";
    $query_update_t2 = mysqli_query($connect, $sql_update_t2);

    
} else {
    echo "No rows found for complaint_id = $complaint_id";
}










$sql_get_dates = "SELECT engine_complete_time, admin_assign_time FROM facility WHERE complaint_id = $complaint_id";
$result_dates = mysqli_query($connect, $sql_get_dates);
if ($result_dates && mysqli_num_rows($result_dates) > 0) {
    $row_dates = mysqli_fetch_assoc($result_dates);
    $admin_assign_time = $row_dates['admin_assign_time'];
    $engine_complete_time = $row_dates['engine_complete_time'];

    $datetime1 = new DateTime($admin_assign_time);
    $datetime2 = new DateTime($engine_complete_time);
    $interval = $datetime1->diff($datetime2);
    $time_difference = $interval->format('%H:%i:%s');

    // Update the "T2" column in the database
    $sql_update_t2 = "UPDATE facility SET T2 = '$time_difference' WHERE complaint_id = $complaint_id";
    $query_update_t2 = mysqli_query($connect, $sql_update_t2);

    
} else {
    echo "No rows found for complaint_id = ";
}

?>

