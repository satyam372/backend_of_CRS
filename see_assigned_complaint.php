<?php
include 'connection.php';

$emp_id = isset($_GET['emp_id']) ? $_GET['emp_id'] : '';
$complaint_id=isset($_POST['complaint_id']) ? $_POST['complaint_id'] : '';
$sql = $sql="SELECT it.ph_no,it.prob,it.sub_prob,it.priority,it.photo,it.descrp,it.floor,it.complaint_id,it.engine_status,logg.department,logg.extension,logg.employee_name,logg.department,it.emp_id FROM logg INNER JOIN it ON it.emp_id=logg.emp_id WHERE engineer='$emp_id'";
$db_data = array();

$result = $connect->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $db_data[] = $row;
    }
    // Send back the complete records as a JSON
 //   echo json_encode($db_data);
} 


$sql_two = $sql="SELECT maintainance.ph_no,maintainance.prob,maintainance.sub_prob,maintainance.priority,maintainance.photo,maintainance.descrp,maintainance.floor,maintainance.complaint_id,maintainance.engine_status,logg.department,logg.extension,logg.department,maintainance.emp_id FROM logg INNER JOIN maintainance ON maintainance.emp_id=logg.emp_id WHERE engineer='$emp_id'";
$db_data_two = array();

$result_two = $connect->query($sql_two);
if ($result_two->num_rows > 0) {
    while ($row = $result_two->fetch_assoc()) {
        $db_data_two[] = $row;
    }
    // Send back the complete records as a JSON
   // echo json_encode($db_data_two);
} 

$sql_three = $sql="SELECT facility.ph_no,facility.prob,facility.sub_prob,facility.priority,facility.photo,facility.descrp,facility.floor,facility.complaint_id,facility.engine_status,logg.department,logg.extension,logg.department,facility.emp_id FROM logg INNER JOIN facility ON facility.emp_id=logg.emp_id WHERE engineer='$emp_id'";
$db_data_three = array();

$result_three = $connect->query($sql_three);
if ($result_three->num_rows > 0) {
    while ($row = $result_three->fetch_assoc()) {
        $db_data_three[] = $row;
    }
    // Send back the complete records as a JSON
   // echo json_encode($db_data_three);
} 

$sql_four = $sql="SELECT biomedical.ph_no,biomedical.prob,biomedical.sub_prob,biomedical.priority,biomedical.photo,biomedical.descrp,biomedical.floor,biomedical.complaint_id,biomedical.engine_status,logg.department,logg.extension,logg.department,biomedical.emp_id FROM logg INNER JOIN biomedical ON biomedical.emp_id=logg.emp_id WHERE engineer='$emp_id'";
$db_data_four = array();

$result_four = $connect->query($sql_four);
if ($result_three->num_rows > 0) {
    while ($row = $result_four->fetch_assoc()) {
        $db_data_four[] = $row;
    }
    // Send back the complete records as a JSON
   // echo json_encode($db_data_three);
}

$response = array_merge($db_data_three,$db_data_four,$db_data,$db_data_two);
echo json_encode($response);


$sql_five="SELECT admin_assign_time, time_date FROM it WHERE complaint_id = $complaint_id";

$connect->close();



// include 'connection.php';
// $emp_id = isset($_POST['emp_id']) ? $_POST['emp_id'] : '';
// $sql = "SELECT ph_no, prob, sub_prob, priority, photo, descrp, floor, complaint_id, engine_status FROM it WHERE engineer='3'";
// $db_data = array();

// $result = $connect->query($sql);
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         // Read the image file
//         $imagePath = $row['photo'];
//         $imageData = file_get_contents($imagePath);

//         // Encode the image data to base64
//         $base64Image = base64_encode($imageData);

//         // Append the base64 encoded image data to the row
//         $row['photo'] = $base64Image;

//         $db_data[] = $row;
//     }
// }

// // You can repeat the same process for other queries as well

// // Merge all the complaint data into a single array
// $response = $db_data;

// // Check if the other arrays are not null before merging
// if (!empty($db_data_two)) {
//     $response = array_merge($response, $db_data_two);
// }
// if (!empty($db_data_three)) {
//     $response = array_merge($response, $db_data_three);
// }
// if (!empty($db_data_four)) {
//     $response = array_merge($response, $db_data_four);
// }

// // Send back the complete records as a JSON
// echo json_encode($response);

// $connect->close();



?>





