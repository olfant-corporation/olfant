<?php
    // post data
    $customerName = $_POST['applicant_name'];
    $customerPhone = $_POST['mobile_number'];
    $customerEmail = $_POST['email_id'];
    $orderAmount = $product_price;
    $orderCurrency = "INR";

    // cashfree payment
    $secretKey = CASHFREE_KEY_SECRET;
    $postData = array(
        "appId" => CASHFREE_APP_ID,
        "orderId" => $orderId,
        "orderAmount" => $orderAmount,
        "orderCurrency" => $orderCurrency,
        "customerName" => $customerName,
        "customerPhone" => $customerPhone,
        "customerEmail" => $customerEmail,
        "returnUrl" => RETURN_URL,
        "notifyUrl" => NOTIFY_URL,
    );

    // get secret key from your config
    ksort($postData);
    $signatureData = "";
    foreach ($postData as $key => $value) {
        $signatureData .= $key.$value;
    }
    $signature = hash_hmac('sha256', $signatureData, $secretKey, true);
    $signature = base64_encode($signature);

    $sql_update_gem_form = 'UPDATE gem_form SET order_id = "'.$orderId.'" WHERE id = "'.$_SESSION['form_id'].'"';
    $result_update_gem_form = $conn->query($sql_update_gem_form);

?>
<form id="redirectForm" method="post" action="<?php echo REQUEST_URL; ?>">
    <input type="hidden" name="appId" value="<?php echo CASHFREE_APP_ID; ?>"/>
    <input type="hidden" name="orderId" value="<?php echo $orderId; ?>"/>
    <input type="hidden" name="orderAmount" value="<?php echo $orderAmount; ?>"/>
    <input type="hidden" name="orderCurrency" value="<?php echo $orderCurrency; ?>"/>
    <input type="hidden" name="customerName" value="<?php echo $customerName; ?>"/>
    <input type="hidden" name="customerEmail" value="<?php echo $customerEmail; ?>"/>
    <input type="hidden" name="customerPhone" value="<?php echo $customerPhone; ?>"/>
    <input type="hidden" name="returnUrl" value="<?php echo RETURN_URL; ?>"/>
    <input type="hidden" name="notifyUrl" value="<?php echo NOTIFY_URL; ?>"/>
    <input type="hidden" name="signature" value="<?php echo $signature; ?>"/>
</form>
 <script>document.getElementById("redirectForm").submit();</script> 
