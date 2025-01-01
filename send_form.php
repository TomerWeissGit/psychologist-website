<?php
// If the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $name    = $_POST['name']    ?? '';
    $email   = $_POST['email']   ?? '';
    $message = $_POST['message'] ?? '';

    // Where to send the email
    $to      = "tomerweiss248@gmail.com";

    // Construct the subject and body
    $subject = "הודעה חדשה מאת $name";
    $body    = "שם: $name\n" .
               "אימייל: $email\n\n" .
               "הודעה:\n$message\n";

    // Additional headers
    $headers = "From: $email\r\n" .
               "Reply-To: $email\r\n" .
               "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    $success = mail($to, $subject, $body, $headers);

    if ($success) {
        // Show a success message or redirect
        echo "<h1>תודה, $name! ההודעה נשלחה בהצלחה.</h1>";
    } else {
        // Show an error message
        echo "<h1>שגיאה: לא ניתן לשלוח את ההודעה</h1>";
    }
}
?>
