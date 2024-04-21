<?php
// Only process POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form field values
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Set recipient email address
    $to = "thedataendroit@gmail.com"; // Replace with your email address

    // Set email subject
    $subject = "New Message from Portfolio Contact Form";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Build email headers
    $headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // Email sent successfully
        echo "Thank you! Your message has been sent.";
    } else {
        // Error sending email
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // Not a POST request, ignore
    header("HTTP/1.1 403 Forbidden");
    echo "Access Forbidden";
}
?>
