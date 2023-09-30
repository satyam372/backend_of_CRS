<?php

include 'connection.php';

// Retrieve the base64-encoded image data
$imageData = $_POST['photo'];

// Decode the base64 image data
$decodedImage = base64_decode($imageData);

// Generate a unique filename for the image
$filename = uniqid() . '.jpg';

// Set the path where you want to save the images
$uploadpath = 'C:/xampp/htdocs/php_connection/images/' . $filename;

// Save the image file
file_put_contents($uploadpath, $decodedImage);

// Connect to your MySQL database


$floor = isset($_POST['floor']) ? $_POST['floor'] : '';
$ph_no = isset($_POST['ph_no']) ? $_POST['ph_no'] : '';
$prob = isset($_POST['prob']) ? $_POST['prob'] : '';
$sub_prob = isset($_POST['sub_prob']) ? $_POST['sub_prob'] : '';
$descrp = isset($_POST['descrp']) ? $_POST['descrp'] : ''; 
$priority = isset($_POST['priority']) ? $_POST['priority'] : '';
$time_date = isset($_POST['time_date']) ? $_POST['time_date'] : '';
//$date = isset($_POST['date']) ? $_POST['date'] : '';
$photo=isset($_POST['photo'])? $_POST['$photo']:'';
$emp_id = isset($_POST['emp_id']) ? $_POST['emp_id'] : '';
$user_status = isset($_POST['user_status']) ? $_POST['user_status'] : '';
$administrator_status = isset($_POST['administrator_status']) ? $_POST['administrator_status'] : '';
$admin_assign_time = isset($_POST['admin_assign_time']) ? $_POST['admin_assign_time'] : '';
$engine_status= isset($_POST['engine_status']) ? $_POST['engine_status'] : '';
$engine_complete_time= isset($_POST['engine_complete_time']) ? $_POST['engine_complete_time'] : '';
$closing_status= isset($_POST['closing_status']) ? $_POST['closing_status'] : '';
$closing_time= isset($_POST['closing_time']) ? $_POST['closing_time'] : '';
$submit=isset($_POST['submit']) ? $_POST['submit'] : '';
$engineer=isset($_POST['engineer']) ? $_POST['engineer'] : '';
$t1=isset($_POST['engineer']) ? $_POST['engineer'] : '';
$t2=isset($_POST['engineer']) ? $_POST['engineer'] : '';
$t3=isset($_POST['engineer']) ? $_POST['engineer'] : '';
$t4=isset($_POST['engineer']) ? $_POST['engineer'] : '';
$sql = "SELECT * FROM maintainance WHERE floor = '$floor' AND ph_no = '$ph_no' AND prob = '$prob' AND sub_prob = '$sub_prob' AND descrp = '$descrp' AND priority = '$priority' AND time_date = '$time_date' AND photo='$photo' AND emp_id='$emp_id'";

$result = mysqli_query($connect, $sql);

// if (!$result) {
//     echo json_encode(array("success" => false, "error" => mysqli_error($connect)));
//     exit();
// }

$count = mysqli_num_rows($result);

if ($count == 1) {
    echo json_encode(array("response" => "error"));
} else {
    $insert = "INSERT INTO maintainance (floor, ph_no, prob, sub_prob, descrp, priority, time_date,photo,emp_id,user_status,administrator_status,admin_assign_time,engine_status,engine_complete_time,closing_status,closing_time,engineer,T1,T2,T3,T4) VALUES ('$floor', '$ph_no', '$prob', '$sub_prob', '$descrp', '$priority', '$time_date','$uploadpath','$emp_id','$submit','$administrator_status','$admin_assign_time','$engine_status','$engine_complete_time','$closing_status','$closing_time','$engineer','$t1','$t2','$t3','$t4')";


    $query = mysqli_query($connect, $insert);
    
    if ($query) {
        echo ("success");
    } else {
        echo ( "error");
    }
}
?>
