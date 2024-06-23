<?php
function form_to_paid($form_id,$orderId,$referenceId,$amount,$merchent_name){
  require("crm_db_conn.php");
  $web= "olfant.com";
  // to crm db
  $connect = new mysqli($crm_servername, $crm_username, $crm_password, $crm_dbname);
  if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }
  
        $sql_assign = "SELECT users.id as user_id,users.username, (SELECT COUNT(forms.processor_id) FROM forms WHERE forms.processor_id = users.id GROUP BY forms.processor_id HAVING forms.processor_id = users.id) as number_of_asaign FROM `users` WHERE users.roll_type_id in(SELECT roll_types.id FROM roll_types WHERE roll_types.roll = 'PROCESSER') ORDER BY number_of_asaign ASC LIMIT 1;";
    $result_assign = $connect->query($sql_assign);

    if ($result_assign->num_rows > 0) {
      while($row_assign = $result_assign->fetch_assoc()) {
         $assign_id = $row_assign["user_id"];
      }
    } else{
        $assign_id = 0;
    }

  $sql = "UPDATE `forms` SET `status`='Paid',`processor_id` = '".$assign_id."' ,`track_status` = 'Process',`order_id` = '".$orderId."',`payment_id` = '".$referenceId."',`price` = '".$amount."',`merchent_name` = '".$merchent_name."' WHERE `web` = '$web' AND `form_id`= $form_id";

  if ($connect->query($sql) === TRUE) {
    return true;
  } else {
    return false;
  }
}
?>
