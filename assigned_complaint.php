<?php

include 'connection.php';
//include 'it.php';

$complaint_id = isset($_POST['complaint_id']) ? $_POST['complaint_id'] : '';
$prob = isset($_POST['prob']) ? $_POST['prob'] : '';
$sub_prob = isset($_POST['sub_prob']) ? $_POST['sub_prob'] : '';
$descrp = isset($_POST['descrp']) ? $_POST['descrp'] : '';
$priority = isset($_POST['priority']) ? $_POST['priority'] : '';
$floor = isset($_POST['floor']) ? $_POST['floor'] : '';
$ph_no = isset($_POST['ph_no']) ? $_POST['ph_no'] : '';
$emp_id = isset($_POST['emp_id']) ? $_POST['emp_id'] : '';
$engineer_assign = isset($_POST['engineer_assign']) ? $_POST['engineer_assign'] : '';
$assign = isset($_POST['assign']) ? $_POST['assign'] : '';
$date = isset($_POST['date']) ? $_POST['date'] : '';

$insert = "INSERT INTO assign (prob, sub_prob, descrp, priority, floor, ph_no, emp_id, engineer_assign, complaint_id) 
           VALUES ('$prob', '$sub_prob', '$descrp', '$priority', '$floor', '$ph_no', '$emp_id', '$engineer_assign', '$complaint_id')";

//$query = mysqli_query($connect, $insert);
$sql_three = "UPDATE it SET administrator_status = '$assign' WHERE complaint_id = $complaint_id";
$query_three = mysqli_query($connect, $sql_three);
$sql_two = "UPDATE it SET admin_assign_time = '$date' WHERE complaint_id = $complaint_id";
$query_two = mysqli_query($connect, $sql_two);
$sql = "UPDATE it SET engineer = '$engineer_assign' WHERE complaint_id = $complaint_id";
$query_one = mysqli_query($connect, $sql);

// Calculate the time difference
$sql_get_dates = "SELECT admin_assign_time, time_date FROM it WHERE complaint_id = $complaint_id";
$result_dates = mysqli_query($connect, $sql_get_dates);
if ($result_dates && mysqli_num_rows($result_dates) > 0) {
    $row_dates = mysqli_fetch_assoc($result_dates);
    $admin_assign_time = $row_dates['admin_assign_time'];
    $time_date = $row_dates['time_date'];

    $datetime1 = new DateTime($admin_assign_time);
    $datetime2 = new DateTime($time_date);
    $interval = $datetime1->diff($datetime2);
    $time_difference = $interval->format('%H:%i:%s');

    // Update the "T1" column in the database
    $sql_update_t1 = "UPDATE it SET T1 = '$time_difference' WHERE complaint_id = $complaint_id";
    $query_update_t1 = mysqli_query($connect, $sql_update_t1);

    if (!$query_update_t1) {
        echo "Error updating T1 column: " . mysqli_error($connect);
    }
} else {
    echo "No rows found for complaint_id = $complaint_id";
}

if ($query_one) {
    echo "success";
} else {
    echo "error";
}

?>



