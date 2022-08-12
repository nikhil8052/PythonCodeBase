<?php

$result=$database->query1("SELECT * from api_keys WHERE source_name='sendgrid' ");
if(mysqli_num_rows($result)>0){
     $row=mysqli_fetch_assoc($result);
     print_r($row);
}else{
    echo " No key is available in the database for the sendgrid Man , Please check the api_key table in the database ";
}


?>