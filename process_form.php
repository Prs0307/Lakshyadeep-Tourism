<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $to = 'prince03702@gmail.com'; // Replace with your actual email address
    $subject = 'New Contact Form Submission';

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    $mailBody = "Name: $name\n";
    $mailBody .= "Email: $email\n";
    $mailBody .= "Message:\n$message";

    // Send the email
    ini_set("SMTP", "your_smtp_server_address");
    ini_set("smtp_port", "your_smtp_port");
    if (mail($to, $subject, $mailBody, $headers)) {
        // Redirect to a thank-you page
        header('Location: thank_you.html');
        exit;
    } else {
        // Handle email sending failure
        echo "Failed to send email. Please try again later.";
    }
}
?>
