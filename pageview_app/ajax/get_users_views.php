<?php

/**
 * Added by : Nikhil 
 * Date : 19 JUNE 2022 
 * Purpose: Fetching User Views 
 */
include("../database/database.php");
// include('../include/session.php');

function fetch_exams()
{
   global $conn1;
   if (isset($conn1)) {
      $exams = array();
      $result = $conn1->query("select id,exam from exam");
      while ($row = mysqli_fetch_assoc($result)) {
         $exams[$row['id']] = $row['exam'];
      }
      return $exams;
   }
}

function exam_mapping($id)
{
   global $exams;
   return $exams[$id];
}



if (isset($_REQUEST['data'])) {

   $req = $_REQUEST['data'];
   $condition = "";
   if (isset($req['exam_ids']) && $req['exam_ids'] != "") {
      $exam_cond = " and ast.exam_id in (" . $req['exam_ids'] . ")";
      $condition = $condition . $exam_cond;
   }

   if (isset($req['class_ids']) && $req['class_ids'] != "") {
      $class_cond = " and su.class_id in (" . $req['class_ids'] . ")";
      $condition = $condition . $class_cond;
   }

   if (isset($req['device_ids']) && $req['device_ids'] != "") {
      $device_id = " and ast.source in (" . $req['device_ids'] . ")";
      $condition = $condition . $device_id;
   }

   if (isset($req['date']) && $req['date'] != "") {
      $date_conn="";
      $condition = $condition . $date_conn;
   }

   $dateto = strtotime(date('d-m-Y'));
   $dateto1 = strtotime(date('d-m-Y') . ' 23:59:59');
   // $condition = $condition." and ast.session_start_time between ".$dateto." and ".$dateto1;

   $total_records = 0;
   $json = array();
   $data["data"] = "";
   $exams = fetch_exams();
   $q = "SELECT ast.mobile,su.id,su.name,su.exam_id,su.target_year,su.current_plan_id,su.timestamp_int,count(DISTINCT analytics_module_page_id) as page_views FROM analytics_students ast,student_users su where ast.mobile=su.mobile and su.estatus=1 and ast.estatus=1" . $condition . " group by ast.mobile";
   $result = $conn1->query($q);
   if (isset($result)) {
      while ($row = mysqli_fetch_assoc($result)) {
         $oneuser = array();
         $oneuser['id'] = $row['id'];
         $oneuser['name'] = $row['name'];
         $oneuser['mobile'] = $row['mobile'];
         $oneuser['registered_time'] = date('d-m-Y H:i:s', $row['timestamp_int']);
         // $oneuser['current_plan'] = $row['current_plan_id'];
         $oneuser['target_year'] = $row['target_year'];
         $oneuser['exam_id'] = exam_mapping($row['exam_id']);
         $oneuser['total_count'] = $row['page_views'];
         $json[$total_records] = $oneuser;
         $total_records += 1;
      }

      $data["data"] = $json;
      $data = json_encode($json);
      echo $data;
   }
} 
else {

   
   $dateto = strtotime(date('d-m-Y'));
   $dateto1 = strtotime(date('d-m-Y') . ' 23:59:59');
   $condition = " and ast.session_start_time between " . $dateto . " and " . $dateto1;

   $total_records = 0;
   $json = array();
   $exams = fetch_exams();
   $q = "SELECT ast.mobile,su.id,su.name,su.exam_id,su.target_year,su.current_plan_id,su.timestamp_int,count(DISTINCT analytics_module_page_id) as page_views FROM analytics_students ast,student_users su where ast.mobile=su.mobile and su.estatus=1 and ast.estatus=1 " . $condition . " group by ast.mobile";
   $result = $conn1->query($q);



   while ($row = mysqli_fetch_assoc($result)) {
      $oneuser = array();
      $oneuser['id'] = $row['id'];
      $oneuser['name'] = $row['name'];
      $oneuser['mobile'] = $row['mobile'];
      $oneuser['registered_time'] = date('d-m-Y H:i:s', $row['timestamp_int']);
      // $oneuser['current_plan'] = $row['current_plan_id'];
      $oneuser['target_year'] = $row['target_year'];
      $oneuser['exam_id'] = exam_mapping($row['exam_id']);
      $oneuser['total_count'] = $row['page_views'];
      $json[$total_records] = $oneuser;
      $total_records += 1;
   }


   $data = array();
   $data["data"] = $json;
   $data = json_encode($data);
   echo $data;


}
