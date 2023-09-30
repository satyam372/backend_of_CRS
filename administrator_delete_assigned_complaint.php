<?php
include 'connection.php';

$complaint_id = isset($_POST['complaint_id']) ? $_POST['complaint_id'] : '';

$sql = "DELETE FROM assign WHERE complaint_id='$complaint_id'";

$query = mysqli_query($connect, $sql);

if ($query) {
    echo "success";
} else {
    echo "error";
}
?>
