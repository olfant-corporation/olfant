<?php

if (!defined('PAYMENT_GATEWAY'))
{
    define('PAYMENT_GATEWAY', 'CASHFREE');
}

// for localhost
if($_SERVER['HTTP_HOST'] != 'localhost')
{

  
  $webName = 'olfant.com';
  $webNumber = '7970788665';
  $webNameUpperCase = strtoupper($webName);
  $appKey = 'skill@0Rs';
  $mailPassword = 'skill@0Rs';
  $mailHost = 'smtp.hostinger.in';
  $mailAddress = 'care@' .$webName. '';

  $host = "localhost";
  $userName = "u468344885_olfant";
  $password = "skill@0Rs";
  $dbName = "u468344885_olfant";

  //Cashfree live

  define('CASHFREE_APP_ID', '632587f4278b88c2963e2d4cc85236');
  define('CASHFREE_KEY_SECRET', '477d8fce486a600d860c07a559c8bceb5ec24fd1');
  define('RETURN_URL', 'https://olfant.com/cashfree/cashfree-response.php');
  define('NOTIFY_URL', 'https://olfant.com/cashfree/cashfree-notification.php');
  define('REQUEST_URL', 'https://test.cashfree.com/billpay/checkout/post/submit');

} else {
  $webName = 'olfant.com';
  $webNumber = '7970788665';
  $webNameUpperCase = strtoupper($webName);
  $appKey = 'skill@0Rs';
  $mailPassword = 'skill@0Rs';
  $mailHost = 'smtp.hostinger.in';
  $mailAddress = 'care@' .$webName. '';

  $host = "localhost";
  $userName = "root";
  $password = "";
  $dbName = "olfant";

  
  // Cashfree Test
  define('CASHFREE_APP_ID', '632587f4278b88c2963e2d4cc85236');
  define('CASHFREE_KEY_SECRET', '477d8fce486a600d860c07a559c8bceb5ec24fd1');
  define('RETURN_URL', 'http://localhost/cashfree/cashfree-response.php');
  define('NOTIFY_URL', 'http://localhost/cashfree/cashfree-notification.php');
  define('REQUEST_URL', 'https://test.cashfree.com/billpay/checkout/post/submit');
  
}


// Create database connection
$conn = new mysqli($host, $userName, $password, $dbName);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}




error_reporting(E_ERROR);
ini_set('display_errors', 0);

// include_once('./get-client-ip.php');
?>
