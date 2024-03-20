<?php
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer();

if (isset($_POST["form_submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $theme = $_POST['theme'];
    $content = $_POST['content'];

    /*$email_to = 'info@mrdesign.com.hk';*/
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->ContentType = 'text/html; charset=UTF-8';
    $email_to = 'info@hma.org.hk';
    $mail->isSMTP();
    $mail->Host = 'sgp25.siteground.asia';  // Specify your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'noreply@hma.org.hk';
    $mail->Password = ')&5ML@7z39#1';
    $mail->Port = 465;  // Specify the SMTP port
    $mail->SMTPSecure = 'ssl';  // Enable encryption, 'ssl' also possible

    // Email content
    $mail->setFrom('noreply@hma.org.hk', 'HMA');
    $mail->addAddress($email_to);  // Add recipient email
    $mail->Subject = 'New enquiry data submitted.';
    $mail->isHTML(true);
    $mail->Body = "
            <html>
                <body style='background-color: #eee; font-size: 16px;'>
                <div style='max-width: 600px; min-width: 200px; background-color: #ffffff; padding: 20px; margin: auto;'>
                
                    <p style='text-align: center;color:green;font-weight:bold'>A new enquiry data has been submitted.</p>
                
                    <p style='color:black;text-align: center'>姓名: <strong>$name</strong></p>
                    <p style='color:black;text-align: center'>電郵地址: <strong>$email</strong></p>
                    <p style='color:black;text-align: center'>聯絡電話: <strong>$number</strong></p>
                    <p style='color:black;text-align: center'>主題: <strong>$theme</strong></p>
                    <p style='color:black;text-align: center'>內容: <strong>$content</strong></p>
                </div>
                </body>
            </html>";

    // Send the email
    if ($mail->send()) {
        echo "
        <script>
        alert('Data submitted successfully!');
        window.location.href = 'index.html';
</script>
        ";
    } else {
        echo "Something went wrong: " . $mail->ErrorInfo;
    }
}