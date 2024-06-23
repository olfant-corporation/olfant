<?php
function from_to_crm($website = null,$type,$form_name,$applicant_name = null,$number = null,$email = null,$status = null,$price,$form_id,$track = null,$date = null){
  $price = (int)$price;
  $form_id = (int)$form_id;
  require("crm_db_conn.php");
  if($website === null){
    $website = strtoupper($_SERVER['SERVER_NAME']);
  }
  if($applicant_name === null){
    $applicant_name ='null';
  }
  if($number === null){
    $number ='null';
  }
  if($email === null){
    $email ='null';
  }
  if($status === null){
    $status ='Unpaid';
  }
  if($track === null){
    $track ='Unpaid';
  }
  if($date === null){
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d H:i:s');
  }
  // to crm db
  $connect = new mysqli($crm_servername, $crm_username, $crm_password, $crm_dbname);
  if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }
 $sql_assign = "SELECT users.id as user_id,users.username, (SELECT COUNT(forms.sales_id) FROM forms WHERE forms.sales_id = users.id GROUP BY forms.sales_id HAVING forms.sales_id = users.id) as number_of_asaign FROM `users` WHERE users.roll_type_id in(SELECT roll_types.id FROM roll_types WHERE roll_types.roll = 'SALE') ORDER BY number_of_asaign ASC LIMIT 1;";
    $result_assign = $connect->query($sql_assign);

    if ($result_assign->num_rows > 0) {
      while($row_assign = $result_assign->fetch_assoc()) {
         $assign_id = $row_assign["user_id"];
      }
    } else{
        $assign_id = 0;
    }
  $sql = "INSERT INTO `forms` (`web`, `type`, `form_name`, `name`, `number`, `email`, `status`, `price`, `form_id`, `track_status`,`form_date`,`sales_id`) VALUES ('$website','$type','$form_name','$applicant_name','$number','$email','$status','$price','$form_id','$track','$date','$assign_id')";

  if ($connect->query($sql) === TRUE) {
    return $connect->insert_id;
  } else {
    return false;
  }
}
?>
