<?php
session_start();
include_once('./config.php'); // contains database credentials
include("admin/crm-form-action.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form input to prevent SQL injection
    $name = $conn->real_escape_string(trim($_POST['name']));
    $phone = $conn->real_escape_string(trim($_POST['phone']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $web = $conn->real_escape_string(trim($_POST['web']));
    $message = $conn->real_escape_string(trim($_POST['message']));

    // Validate form input
    if (empty($name) || empty($phone) || empty($email) || empty($web) || empty($message)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        // Insert data into the database
        $sql = "INSERT INTO olfant_form (form_name, applicant_name, mobile_number, email_id, contact_website, contact_message) VALUES ('Olfant contact form', '$name', '$phone', '$email', '$web', '$message')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION["form_id"] = $conn->insert_id;
            date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d H:i:s');
            $response = from_to_crm("OLFANT.COM", "OL", "contact form", $name, $phone, $email, "Unpaid", 0, $_SESSION["form_id"], "Unpaid", $date);
            $success = "Your message was sent successfully.";
        } else {
            $error = "Error: " . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
