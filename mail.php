<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.hostinger.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'info@kefaloniaphotoshoots.com'; // SMTP username
    $mail->Password   = 'i.s.m.i.n.i.KEF1';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $persons = $_POST['persons'];
    $kids = isset($_POST['kids']) ? $_POST['kids'] : '';
    $request = $_POST['request'];
    $message = $_POST['message'];

    // Sender email (use for both sending and reply-to)
    $sender_email = $email;

    // Recipients
    $mail->setFrom('info@kefaloniaphotoshoots.com', $name); // Set sender and sender's name
    $mail->addAddress('info@kefaloniaphotoshoots.com'); // Recipient's email
    $mail->addReplyTo($sender_email);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Booking Request'; // You can customize the subject as needed

    // Constructing the email body
    $email_body = "
        <html>
        <body>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Number of Persons:</strong> $persons</p>
            <p><strong>Number of Kids:</strong> $kids</p>
            <p><strong>Specific Requests:</strong></p>
            <p>$request</p>
            <p><strong>Message:</strong></p>
            <p>$message</p>
        </body>
        </html>
    ";

    $mail->Body = $email_body;

    $mail->send();
    echo "<script>alert('Your message was sent successfully! I will get back to you soon.'); window.location.href = 'index.html';</script>";
    exit();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
