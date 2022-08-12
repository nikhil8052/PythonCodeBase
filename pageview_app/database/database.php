<?php




$servername = "localhost";
$username = "root";
$password = "";
$database1='neetjee';
$database2='qsbank';

// Create connection
$conn1 = mysqli_connect($servername,$username,$password,$database1);
$conn2 = mysqli_connect($servername,$username,$password,$database2);

// // Check connection
// if ($conn1->connect_error) {
//   echo " conn1 is not connected ";
//   die("Connection failed: " . $conn->connect_error);
// }
// if ($conn2->connect_error) {
//   // die("Connection failed: " . $conn->connect_error);
//   echo " conn2 is not connected ";
// }





?>