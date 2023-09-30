<?php
include 'connection.php';

$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);




$emp_id = isset($_GET['emp_id']) ? $_GET['emp_id'] : '';

// ... rest of the code ...



$sql = "SELECT complaint_id, prob, user_status, time_date, administrator_status, admin_assign_time, 
        engine_status, engine_complete_time, closing_status, closing_time 
        FROM it 
        WHERE emp_id = '$emp_id'";
$db_data = array();

$result = $connect->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $db_data[] = $row;
    }
    // Send back the complete records as a JSON
   // echo json_encode($db_data);
} 

$sql_two = "SELECT complaint_id, prob, user_status, time_date, administrator_status, admin_assign_time, 
            engine_status, engine_complete_time, closing_status, closing_time 
            FROM facility 
            WHERE emp_id = '$emp_id'";
$db_data_two = array();

$result_two = $connect->query($sql_two);
if ($result_two->num_rows > 0) {
    while ($row = $result_two->fetch_assoc()) {
        $db_data_two[] = $row;
    }
    // Send back the complete records as a JSON
    //echo json_encode($db_data_two);
} 

$sql_three = "SELECT complaint_id, prob, user_status, time_date, administrator_status, admin_assign_time, 
              engine_status, engine_complete_time, closing_status, closing_time 
              FROM biomedical 
              WHERE emp_id = '$emp_id'";
$db_data_three = array();

$result_three = $connect->query($sql_three);
if ($result_three->num_rows > 0) {
    while ($row = $result_three->fetch_assoc()) {
        $db_data_three[] = $row;
    }
    // Send back the complete records as a JSON
   // echo json_encode($db_data_three);
} 


$sql_four = "SELECT complaint_id, prob, user_status, time_date, administrator_status, admin_assign_time, 
              engine_status, engine_complete_time, closing_status, closing_time 
              FROM maintainance 
              WHERE emp_id = '$emp_id'";
$db_data_four = array();

$result_four = $connect->query($sql_four);
if ($result_four->num_rows > 0) {
    while ($row = $result_four->fetch_assoc()) {
        $db_data_four[] = $row;
    }
    // Send back the complete records as a JSON
   // echo json_encode($db_data_three);
} 

 $response = array_merge( $db_data,$db_data_two,$db_data_three,$db_data_four );
 echo json_encode($response);



 

$connect->close();
?>
