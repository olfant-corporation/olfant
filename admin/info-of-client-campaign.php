<?php
$web = "olfant.com";
require("crm_db_conn.php");
// to crm db
$connect = new mysqli($crm_servername, $crm_username, $crm_password, $crm_dbname);
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}

$sql = "SELECT * FROM `campain_data` WHERE `id` = '$id'";
$result = $connect->query($sql);
if ($result->num_rows == 1) {
  while($row = $result->fetch_assoc()) {
    $form_name = $row['form_name']; $name = $row['name']; $number = $row['number']; $email = $row['email']; 
  }
}else{
    $name ='';
    $email = '';
    $number = '';
    
}
?>
