<?php
include("../../database/database.php");

$q="SELECT month(student_users.timestamp) as month_name , count(*) as count_num FROM student_users where exam_id in (2) GROUP by month(student_users.timestamp)";
$result=$conn1->query($q);
$json=array();
$i=0;

function intToMonthName($val){

     switch($val){
          case 1:
               return "Januruary";
          case 2 :
               return "Feburuary";
          case 3 :
               return "March";
          case 4 :
               return "April";
          case 5:
               return "May";
          case 6 :
               return "June";
          case 7 :
               return "July";
          case 8:
               return "August";
          case 9 :
               return "September";
          case 10 :
               return "October";
          case 11 :
               return "November";
          case 12 :
               return "December";
          default :
              return " Not Defined";

     }
}

while($row=mysqli_fetch_assoc($result)){
     if($i%2==0){
          $performance=1;
     }else{
          $performance=0;
     }
     $onedata=[intToMonthName($row['month_name']),$row['count_num'],$row['count_num'],$row['count_num'],$performance];
     if($i!=0){
          array_push($json,$onedata);
          
     }
     $i=$i+1;
}
echo json_encode($json);
?>