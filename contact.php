<?php

// Verify reCAPTCHA response
$recaptchaSecret = "6LfZHrwnAAAAAOGGSYVHmSP64Er0VGF4JTfmI0Y1"; // Replace with your reCAPTCHA secret key
$recaptchaResponse = $_POST['recaptcha_response'];

$recaptchaVerification = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=$recaptchaResponse");
$recaptchaResult = json_decode($recaptchaVerification, true);

if (!$recaptchaResult['success']) {
    echo "reCAPTCHA verification failed.";
    exit();
}

// Get form data
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

// Require the PHPMailer library
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

try {
    // Create a new instance of PHPMailer
    $mail = new PHPMailer(true);

    // Enable SMTP debugging
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    // Set SMTP configuration
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Your Gmail credentials
    $mail->Username = "mohamedanasfrkz@gmail.com";
    $mail->Password = "fbydydnmcbtqqipk"; // Use the app password you generated

    // Set sender and recipient for receiving form details
    $mail->setFrom($email, $name);
    $mail->addAddress("mohamedanasfrkz@gmail.com", "Mohamed Anas"); // Change to your email and name

    // Email subject and body for receiving form details
    $mail->Subject = "Form Submission: $subject";
    $mail->Body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";

    // Send the email with form details
    $mail->send();

    // Set sender and recipient for user confirmation
    $mail->ClearAllRecipients(); // Clear previous recipients
    $mail->setFrom("mohamedanasfrkz@gmail.com", "Mohamed Anas"); // Change to your email and name
    $mail->addAddress($email, $name);

    // Email subject and body for user confirmation
    $mail->Subject = "Confirmation: Message Submitted Successfully";
    $mail->Body = "Dear $name,\n\nThank you for contacting us. We have received your message.\n\nRegards,\nQ Plus Technical";

    // Send the confirmation email to the user
    $mail->send();

    //Display success message using JavaScript
    echo '<script>alert("Message sent successfully!");</script>';
    // header("Location: index.php");
} catch (Exception $e) {
    // Catch and handle any exceptions that occur
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

 ?>

