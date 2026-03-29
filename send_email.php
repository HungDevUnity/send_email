<?php
include 'PHPMailer/src/Exception.php';
include 'PHPMailer/src/PHPMailer.php';
include 'PHPMailer/src/SMTP.php';
include 'connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = htmlspecialchars($_POST["to"]);
    $subject = htmlspecialchars(trim($_POST["subject"]));   
    $message = htmlspecialchars(trim($_POST["message"]));
    if(!filter_var($to, FILTER_VALIDATE_EMAIL)) {
        die ("Invalid email format");
    }

    $mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com'; // Replace with your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'lthung93qn@gmail.com';
    $mail->Password = 'cyuw qqgv luhx yfmd';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('lthung93qn@gmail.com', 'Lê Thế Hùng');
    $mail->addAddress($to);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = nl2br($message);
    $mail->AltBody = strip_tags($message);
    $mail->send();
    echo 'Email has been sent successfully';
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}"; }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gửi Email</title>
</head>
<body>
    <h1>Gửi Email</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="to">Gửi tới Email:</label><br>
        <input type="email" id="to" name="to" required><br><br>
        <label for="subject">Chủ đề:</label><br>
        <input type="text" id="subject" name="subject" required><br><br>
        <label for='attachment'>Đính kèm:</label><br>
        <input type="file" id="attachment" name="attachment"><br><br>
        <label for="message">Nội dung:</label><br>
        <textarea id="message" name="message" rows="5" required></textarea><br><br>
        <button type="submit">Gửi Email</button>
    </form>
</body>>
</html> 
