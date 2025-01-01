<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// 1. Include Composer's autoloader
require __DIR__ . '/vendor/autoload.php';

// 2. Check if we got a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form inputs
    $name    = $_POST['name']    ?? '';
    $email   = $_POST['email']   ?? '';
    $message = $_POST['message'] ?? '';

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                      // Use SMTP
        $mail->Host       = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth   = true;             // Enable SMTP authentication
        $mail->Username   = 'ronniepsytlv@gmail.com';      // Gmail username
        $mail->Password   = 'RsTw16092612';    // Gmail App Password
        $mail->SMTPSecure = 'tls';            // Encryption (tls or ssl)
        $mail->Port       = 587;             // TCP port for Gmail TLS: 587

        // Recipients
        $mail->setFrom('ronniepsytlv@gmail.com', 'Form Submission'); // "From" field
        $mail->addAddress('tomerweiss248@gmail.com');               // The address to receive submissions

        // Content
        $mail->isHTML(false); // Set email format to plain text (or true for HTML)
        $mail->Subject = "New contact form from $name";
        $mail->Body    = "Name: $name\n"
                        ."Email: $email\n\n"
                        ."Message:\n$message\n";

        // Attempt to send the email
        $mail->send();

        // Show success or redirect to a success page
        echo "<h1>תודה, $name! הודעתך נשלחה בהצלחה.</h1>";
    } catch (Exception $e) {
        // Show error message
        echo "<h1>לא ניתן לשלוח את הודעתך. Error: {$mail->ErrorInfo}</h1>";
    }
}
