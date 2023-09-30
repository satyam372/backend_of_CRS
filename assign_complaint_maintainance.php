<?php

include 'connection.php';

$sql="SELECT ph_no,prob, priority,photo,emp_id,sub_prob,descrp,floor,complaint_id,administrator_status ,T4 FROM maintainance";
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