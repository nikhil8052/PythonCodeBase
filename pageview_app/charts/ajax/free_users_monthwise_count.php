<?php
include("../../database/database.php");

$q="SELECT month(student_users.timestamp) as month_name , count(*) as count_num FROM student_users GROUP by month(student_users.timestamp)";
$result=$conn1->query($q);
$json=array();
$i=1;


while($row=mysqli_fetch_assoc($result)){
    $one_record=array();
    $one_record['total']=rand(1,1000);
    $one_record['active']=rand(1,1000);
    $one_record['absent']=rand(1,1000);
    $json[$i]=$one_record;
    $i=$i+1;

}
echo json_encode($json);
?>