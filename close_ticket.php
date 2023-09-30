<?php

include 'connection.php';




$complaint_id = isset($_POST['complaint_id']) ? $_POST['complaint_id'] : '1';
$close = isset($_POST['close']) ? $_POST['close'] : '';
$Date = isset($_POST['Date']) ? $_POST['Date'] : '';

$sql="UPDATE it SET closing_status = '$close' ,closing_time='$Date' WHERE complaint_id = '$complaint_id'";
$query = mysqli_query($connect, $sql);

$sql_two="UPDATE biomedical SET closing_status = '$close' ,closing_time='$Date' WHERE complaint_id = '$complaint_id'";
$querytwo = mysqli_query($connect, $sql_two);


$sqlthree="UPDATE facility SET closing_status = '$close' ,closing_time='$Date' WHERE complaint_id = '$complaint_id'";
$querythree = mysqli_query($connect, $sqlthree);


$sqlfour="UPDATE   maintainance SET closing_status= '$close' ,closing_time='$Date' WHERE complaint_id = '$complaint_id'";
$queryfour = mysqli_query($connect, $sqlfour);



// $sqlsix="INSERT INTO biomedical_report (floor, ph_no, prob, sub_prob, descrp, priority, time_date, photo, emp_id, user_status, administrator_status, admin_assign_time, engine_status, engine_complete_time, closing_status, closing_time, engineer)
// SELECT floor, ph_no, prob, sub_prob, descrp, priority, time_date, photo, emp_id, user_status, administrator_status, admin_assign_time, engine_status, engine_complete_time, closing_status, closing_time, engineer
// FROM biomedical
// WHERE complaint_id = '$complaint_id'";
// $querysix=mysqli_query($connect,$sqlsix);


// $sqlfive = "DELETE FROM biomedical WHERE complaint_id='$complaint_id'";
// $queryfive=mysqli_query($connect,$sqlfive);



// if ($query) {
//     echo "success";
// } else {
//     echo "error";
// }

// if ($querytwo) {
//     echo "success";
// } else {
//     echo "error";
// }


// if ($querythree) {
//     echo "success";
// } else {
//     echo "error";
// }


// if ($queryfour) {
//     echo "success";
// } else {
//     echo "error ";
// }


// if ($queryfive) {
//     echo "success";
// } else {
//     echo "error";
// }


// if ($querysix) {
//     echo "success";
// } else {
//     echo "error";
// }



$sql_get_dates = "SELECT engine_complete_time, closing_time FROM it WHERE complaint_id = $complaint_id";
$result_dates = mysqli_query($connect, $sql_get_dates);
if ($result_dates && mysqli_num_rows($result_dates) > 0) {
    $row_dates = mysqli_fetch_assoc($result_dates);
    $engine_complete_time = $row_dates['engine_complete_time'];
    $closing_time = $row_dates['closing_time'];

    $datetime1 = new DateTime($engine_complete_time);
    $datetime2 = new DateTime($closing_time);
    $interval = $datetime1->diff($datetime2);
    $time_difference = $interval->format('%H:%i:%s');

    // Update the "T2" column in the database
    $sql_update_t2 = "UPDATE it SET T3 = '$time_difference' WHERE complaint_id = $complaint_id";
    $query_update_t2 = mysqli_query($connect, $sql_update_t2);

    
} else {
    echo "No rows found for complaint_id = $complaint_id";
}










$sql_get_dates = "SELECT engine_complete_time, closing_time FROM biomedical WHERE complaint_id = $complaint_id";
$result_dates = mysqli_query($connect, $sql_get_dates);
if ($result_dates && mysqli_num_rows($result_dates) > 0) {
    $row_dates = mysqli_fetch_assoc($result_dates);
    $admin_assign_time = $row_dates['engine_complete_time'];
    $engine_complete_time = $row_dates['closing_time'];

    $datetime1 = new DateTime($admin_assign_time);
    $datetime2 = new DateTime($engine_complete_time);
    $interval = $datetime1->diff($datetime2);
    $time_difference = $interval->format('%H:%i:%s');

    // Update the "T2" column in the database
    $sql_update_t2 = "UPDATE biomedical SET T3 = '$time_difference' WHERE complaint_id = $complaint_id";
    $query_update_t2 = mysqli_query($connect, $sql_update_t2);

    
} else {
    echo "No rows found for complaint_id = $complaint_id";
}










$sql_get_dates = "SELECT engine_complete_time, closing_time FROM maintainance WHERE complaint_id = $complaint_id";
$result_dates = mysqli_query($connect, $sql_get_dates);
if ($result_dates && mysqli_num_rows($result_dates) > 0) {
    $row_dates = mysqli_fetch_assoc($result_dates);
    $admin_assign_time = $row_dates['engine_complete_time'];
    $engine_complete_time = $row_dates['closing_time'];

    $datetime1 = new DateTime($admin_assign_time);
    $datetime2 = new DateTime($engine_complete_time);
    $interval = $datetime1->diff($datetime2);
    $time_difference = $interval->format('%H:%i:%s');

    // Update the "T2" column in the database
    $sql_update_t2 = "UPDATE maintainance SET T3 = '$time_difference' WHERE complaint_id = $complaint_id";
    $query_update_t2 = mysqli_query($connect, $sql_update_t2);

    
} else {
    echo "No rows found for complaint_id = $complaint_id";
}



















$sql_get_dates = "SELECT engine_complete_time, closing_time FROM facility WHERE complaint_id = $complaint_id";
$result_dates = mysqli_query($connect, $sql_get_dates);
if ($result_dates && mysqli_num_rows($result_dates) > 0) {
    $row_dates = mysqli_fetch_assoc($result_dates);
    $admin_assign_time = $row_dates['engine_complete_time'];
    $engine_complete_time = $row_dates['closing_time'];

    $datetime1 = new DateTime($admin_assign_time);
    $datetime2 = new DateTime($engine_complete_time);
    $interval = $datetime1->diff($datetime2);
    $time_difference = $interval->format('%H:%i:%s');

    // Update the "T2" column in the database
    $sql_update_t2 = "UPDATE facility SET T3 = '$time_difference' WHERE complaint_id = $complaint_id";
    $query_update_t2 = mysqli_query($connect, $sql_update_t2);

    
} else {
    echo "No rows found for complaint_id = $complaint_id";
}










$sql_get_dates = "SELECT time_date, closing_time FROM it WHERE complaint_id = $complaint_id";
$result_dates = mysqli_query($connect, $sql_get_dates);
if ($result_dates && mysqli_num_rows($result_dates) > 0) {
    $row_dates = mysqli_fetch_assoc($result_dates);
    $admin_assign_time = $row_dates['time_date'];
    $engine_complete_time = $row_dates['closing_time'];

    $datetime1 = new DateTime($admin_assign_time);
    $datetime2 = new DateTime($engine_complete_time);
    $interval = $datetime1->diff($datetime2);
    $time_difference = $interval->format('%H:%i:%s');

    // Update the "T2" column in the database
    $sql_update_t2 = "UPDATE it SET T4 = '$time_difference' WHERE complaint_id = $complaint_id";
    $query_update_t2 = mysqli_query($connect, $sql_update_t2);

    
} else {
    echo "No rows found for complaint_id = $complaint_id";
}















$sql_get_dates = "SELECT time_date, closing_time FROM facility WHERE complaint_id = $complaint_id";
$result_dates = mysqli_query($connect, $sql_get_dates);
if ($result_dates && mysqli_num_rows($result_dates) > 0) {
    $row_dates = mysqli_fetch_assoc($result_dates);
    $admin_assign_time = $row_dates['time_date'];
    $engine_complete_time = $row_dates['closing_time'];

    $datetime1 = new DateTime($admin_assign_time);
    $datetime2 = new DateTime($engine_complete_time);
    $interval = $datetime1->diff($datetime2);
    $time_difference = $interval->format('%H:%i:%s');

    // Update the "T2" column in the database
    $sql_update_t2 = "UPDATE facility SET T4 = '$time_difference' WHERE complaint_id = $complaint_id";
    $query_update_t2 = mysqli_query($connect, $sql_update_t2);

    
} else {
    echo "No rows found for complaint_id = $complaint_id";
}









$sql_get_dates = "SELECT time_date, closing_time FROM biomedical WHERE complaint_id = $complaint_id";
$result_dates = mysqli_query($connect, $sql_get_dates);
if ($result_dates && mysqli_num_rows($result_dates) > 0) {
    $row_dates = mysqli_fetch_assoc($result_dates);
    $admin_assign_time = $row_dates['time_date'];
    $engine_complete_time = $row_dates['closing_time'];

    $datetime1 = new DateTime($admin_assign_time);
    $datetime2 = new DateTime($engine_complete_time);
    $interval = $datetime1->diff($datetime2);
    $time_difference = $interval->format('%H:%i:%s');

    // Update the "T2" column in the database
    $sql_update_t2 = "UPDATE biomedical SET T4 = '$time_difference' WHERE complaint_id = $complaint_id";
    $query_update_t2 = mysqli_query($connect, $sql_update_t2);

    
} else {
    echo "No rows found for complaint_id = $complaint_id";
}

















$sql_get_dates = "SELECT time_date, closing_time FROM maintainance WHERE complaint_id = $complaint_id";
$result_dates = mysqli_query($connect, $sql_get_dates);
if ($result_dates && mysqli_num_rows($result_dates) > 0) {
    $row_dates = mysqli_fetch_assoc($result_dates);
    $admin_assign_time = $row_dates['time_date'];
    $engine_complete_time = $row_dates['closing_time'];

    $datetime1 = new DateTime($admin_assign_time);
    $datetime2 = new DateTime($engine_complete_time);
    $interval = $datetime1->diff($datetime2);
    $time_difference = $interval->format('%H:%i:%s');

    // Update the "T2" column in the database
    $sql_update_t2 = "UPDATE maintainance SET T4 = '$time_difference' WHERE complaint_id = $complaint_id";
    $query_update_t2 = mysqli_query($connect, $sql_update_t2);

    
} else {
    echo "No rows found for complaint_id = $complaint_id";
}
?>