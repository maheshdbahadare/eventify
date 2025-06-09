<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Load Composer dependencies

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'maheshbahadare9767@gmail.com'; // Your email
        $mail->Password = 'tujh ohst whtu uhqz'; // App Password recommended
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('maheshbahadare9767@gmail.com', 'Jack');
        $mail->addAddress($email);
        $mail->Subject = "Invitation to Event";
        $mail->Body = $message;
        $mail->isHTML(true); // Enable HTML formatting if needed

        $mail->send();
        echo "Email sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}
?>
