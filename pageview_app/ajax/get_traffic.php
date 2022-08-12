<?php
include("../database/database.php");

    $condition="";
    $today=true;
    // if($today==true){
         $start_timestamp = strtotime(date('d-m-Y'));
         $end_timestamp = strtotime(date('d-m-Y') . ' 23:59:59');
        $condition=$condition." and session_start_time between ".$start_timestamp."  and ".$end_timestamp;
    // }
    $q="SELECT  count(mobile) as today_active FROM  analytics_students where estatus=1 ".$condition." group by mobile";
  
    $result=$conn1->query($q);
    $json["today_active"]=array();
    $json["yester_active"]=array();
    while($row=mysqli_fetch_assoc($result)){
        $json["today_active"]=$row['today_active'];
    }
    echo json_encode($json);


?>