<?php
session_start();
include_once('../config.php');
include_once('../vendor/autoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function generate($length = 7) {
    $chars = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $token = '';
    while(strlen($token) < $length) {
        $token .= $chars[mt_rand(0, strlen($chars)-1)];
    }
    return 'SAVE_RESPONSE_' . strtoupper($token);
}

$response = file_get_contents('php://input');
file_put_contents('./cashfree-log/'.generate(13), $response);
$data = explode('&', urldecode($response));

$secretKey = CASHFREE_KEY_SECRET;
$orderId = $_POST["orderId"];
$orderAmount = $_POST["orderAmount"];
$referenceId = $_POST["referenceId"];
$txStatus = $_POST["txStatus"];
$paymentMode = $_POST["paymentMode"];
$txMsg = $_POST["txMsg"];
$txTime = $_POST["txTime"];
$signature = $_POST["signature"];
$data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
$hash_hmac = hash_hmac('sha256', $data, $secretKey, true) ;
$computedSignature = base64_encode($hash_hmac);
if ($signature == $computedSignature) {
    if ($txStatus == 'SUCCESS') {

        $sql =
        "
        UPDATE gem_form
        SET payment_id = '".$referenceId."',
        payment_status = 'Paid'
        WHERE order_id = '".$orderId."'
        ";
        $result = $conn->query($sql);
        $_SESSION['orderId'] = $orderId;

        $sql = "SELECT * FROM gem_form WHERE order_id = '".$_SESSION['orderId']."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        require("../admin/success-paid-client.php");
        form_to_paid($row['id'],$orderId,$referenceId,$orderAmount + 0,$secretKey);

        $editable_link_btn = '';
        if ((isset($_COOKIE['token_function']))&&($_COOKIE['token_function'] == 'BULK_DATA_CAMPN')){ echo 'test';
        $cid_editable_sql = "SELECT * FROM `cid` WHERE `uid` = '".$row['id']."'";
        $result_id_editable = $conn->query($cid_editable_sql);
            if ($result_id_editable->num_rows == 1) {
                include('../editable/data-form.php');
                while($row_id_editable = $result_id_editable->fetch_assoc()) {
                $editable_link_full = $current_link.$form_data[$row_id_editable['form_name']]['form_link'].'?cid='.$row_id_editable['cid'].'&token_function=BULK_DATA_CAMPN';

                $editable_link_btn = '
                <br>
                <span style="color:yellow;"><b>Please Upload Document For Next Proccess :-----</b></span><br>
                <a href="'.$editable_link_full.'" style="    background: #385067;color:#ffffff;text-decoration:none;padding:10px;margin-top:20px;display:inline-flex;"><b>Click Here For Upload Document</b></a>';

                }
            }
        }

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.in';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'no-reply@olfant.com';
        $mail->Password   = 'skill@0Rs';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
        $mail->setFrom('no-reply@olfant.com', "GEM Registration");
        $mail->addAddress("".$row['email_id']."");
        $mail->isHTML(true);
            $mail->Subject = "Payment Successful For ".$row['form_name']."";


            $mail->Body    = '
            <section style="width:100%;background-color: ;font-family: \'Poppins\', sans-serif;">
        <div style="background-color:#385067;align-items: center;text-align:center; padding:20px 8px;color:#fff;border-bottom:10px solid #de9443;"><div style="font-size: 31px;font-weight: 700;">Payment Done Sucessful  For '.$row['form_name'].'</div></div>
        <br>
        <center><img src="https://olfant.com/assets/image/gem-thank-you.png" /></center><br>
        <span>Dear '.$row['applicant_name'].',</span><br><br>
        <span>Greeting of the Day</span><br><br>

        <div id="container">
        <p style="font-weight: 700; display: flex;">NOTE : Final Certificate will be delivered within 2-3 working days.
        </p>
        <h1 style="color:#385067;">Your order details are as follows:</h1>

        <table style="  border-collapse: collapse;">
        <tbody>
        <tr style="font-weight:800; color:#385067;border-bottom: 1px solid #fff;"><td style="padding: 8px;">APPLICANT NAME: </td><td style="padding: 8px;">'.strtoupper($row["applicant_name"]).'</td></tr>
        <tr style="font-weight:800; color:#385067;border-bottom: 1px solid #fff;"><td style="padding: 8px;">EMAIL ID: </td><td style="padding: 8px;">'.strtoupper($row['email_id']).'</td></tr>
        <tr style="font-weight:800; color:#385067;border-bottom: 1px solid #fff;"><td style="padding: 8px;">MOBILE NUMBER: </td><td style="padding: 8px;">'.strtoupper($row['mobile_number']).'</td></tr>
        <tr style="font-weight:800; color:#385067;border-bottom: 1px solid #fff;"><td style="padding: 8px;">AMOUNT PAID: </td><td style="padding: 8px;">'.strtoupper($row['total_amount']).'</td></tr>
        <tr style="font-weight:800; color:#385067;border-bottom: 1px solid #fff;"><td style="padding: 8px;">PAYMENT ID: </td><td style="padding: 8px;">'.strtoupper($row["payment_id"]).'</td></tr>
        <tr style="font-weight:800; color:#385067;border-bottom: 1px solid #fff;"><td style="padding: 8px;">ORDER ID: </td><td style="padding: 8px;">'.strtoupper($row['order_id']).'</td></tr>
        <tr style="font-weight:800; color:#385067;border-bottom: 1px solid #fff;"><td style="padding: 8px;">PAYMENT STATUS: </td><td style="padding: 8px;">PAID</td></tr>
        </tbody>
        </table>
        '.$editable_link_btn.'
        <br>
        <p style="font-weight: 700;">Your GEM Registration Number will be generated within next 12 Hrs.  and the same will be sent on your registered email address.</p>
        <br><br>
        <h4>Note:</h4>
        1) Your application along with payment has been received and the same will be processed by our experts in next 24 - 48 working hours.<br>
        <strong>2) At the time of processing, one link will be sent to you for OTP collection. We collect OTP only through system generated automatic links, linked to clients application to reduce human intervention.</strong><br>
        3) Normally certificate generation takes 10 - 15 working days. However due to restrictions placed by COVID-19, this may take longer than usual.
        <br>
        <Br>
        </div>


        <br>
        Due to system upgradation on account of financial year change, processing of certificates will be delayed.
        <br>
        Your application has been queued up for processing and the final certificate will be sent on your registered email address
        within 7 - 10 working days.
        <br>
        We expect your cooperation for the same.
        <br>

            <span>Regards</span><br>
        <span>Team Processing</span><br>
        <span>Mail Us: <a href="mailto:care@olfant.com">care@olfant.com</a></span><br>
        For Order Status: <a href="https://olfant.com/track-order.php">Click here<a><br>
        For Complaint: <a href="https://olfant.com/complaint-order.php">Click here<a><br>

            <div style="text-align: center;padding: 20px 0px;color: gray;">
        <div style="margin-bottom: 5px;">GEM Registration © 2022</div>
        <div><a href="https://olfant.com/about-us.php" style="text-decoration: none;color: gray;">About</a></div>
        </div>
        <span>Note : Do not reply to this email as this is an unattended email.</span>
        </section>
     ';

            $mail->send();

            $mail->ClearAllRecipients();

            $mail->addAddress('no-reply@olfant.com');
            $mail->isHTML(true);
            $mail->Subject = "Payment Received For ".$row["form_name"]."";
            $mail->Body    = "
                            APPLICANT NAME: ".$row["applicant_name"]."<br>
                            EMAIL ID: ".$row['email_id']."<br>
                            MOBILE NUMBER: ".$row['mobile_number']."<br>
                            AMOUNT PAID: ".$row['total_amount']."<br>
                            PAYMENT ID: ".$row["payment_id"]."<br>
                            ORDER ID: ".$row['order_id']."<br>
                            PAYMENT STATUS: Paid
                            ";

            $mail->send();

        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        header ('location: ../success.php');
    } else {
        echo 'Payment Failed';
    }
} else {
    echo 'Payment Failed';
}

?>
