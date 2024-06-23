<?php
$host = "127.0.0.1";
$userName = "root";
$password = "";
$dbName = "olfant";


// Create database connection
$conn = new mysqli($host, $userName, $password, $dbName);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//Cashfree Test
define('PAYMENT_GATEWAY', 'CASHFREE');
define('CASHFREE_APP_ID', '632587f4278b88c2963e2d4cc85236');
define('CASHFREE_KEY_SECRET', '477d8fce486a600d860c07a559c8bceb5ec24fd1');
define('RETURN_URL', 'https://olfant.com/cashfree/cashfree-response.php');
define('NOTIFY_URL', 'https://olfant.com/cashfree/cashfree-notification.php');
define('REQUEST_URL', 'https://test.cashfree.com/billpay/checkout/post/submit');

error_reporting(E_ERROR);
ini_set('display_errors', 0);

// include_once('./get-client-ip.php');
?>
