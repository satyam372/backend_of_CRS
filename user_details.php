<?php

include 'connection.php';

$emp_id=isset($_GET['emp_id']) ? $_GET['emp_id'] : '';

$sql=" SELECT * FROM logg WHERE emp_id='$emp_id'";
$db_data=array();

$result=$connect->query($sql);
if ($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $db_data[]=$row;

    }

    echo json_encode($db_data);
}

else{

    echo('error');
}

?>