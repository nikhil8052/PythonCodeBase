<?php
include("../database/database.php");

$q="SELECT amp.sub_module ,COUNT(analytics_module_page_id) as page_view FROM analytics_students ass ,analytics_module_pages amp where ass.analytics_module_page_id=amp.id  GROUP by ass.analytics_module_page_id order by page_view asc";
$result=$conn1->query($q);
$json=array();
while($row=mysqli_fetch_assoc($result)){
     $onedata=[$row['sub_module'],$row['page_view']];
     array_push($json,$onedata);
}
echo json_encode($json);
?>