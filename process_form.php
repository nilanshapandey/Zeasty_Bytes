<?php
// process_form.php
require_once 'db.php'; // optional: if you want to save to DB

// Owner email
// $owner_email = 'owner@example.com'; // replace with real owner email

// Simple sanitize & validate (no "??")
$name    = isset($_POST['name']) ? trim($_POST['name']) : '';
$mobile  = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
$email   = isset($_POST['email']) ? trim($_POST['email']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';


// Optional: save to DB
if (isset($conn)) {
    $stmt = $conn->prepare("INSERT INTO bookings (name,mobile,email,message) VALUES (?,?,?,?)");
    if ($stmt) {
        $stmt->bind_param('ssss', $name, $mobile, $email, $message);
        $stmt->execute();
        $stmt->close();
    }
}

// --- Email sending ---
// If composer not installed, you can fallback to PHP mail()
// if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
//     // Fallback using PHP mail()
//     $to = $owner_email;
//     $subject = "New Booking from " . $name;
//     $headers = "From: no-reply@yourdomain.com\r\n";
//     if (!empty($email)) $headers .= "Reply-To: $email\r\n";
//     $headers .= "MIME-Version: 1.0\r\n";
//     $headers .= "Content-type: text/html; charset=UTF-8\r\n";

//     $body = "<h3>New Booking / Contact</h3>"
//           . "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>"
//           . "<p><strong>Mobile:</strong> " . htmlspecialchars($mobile) . "</p>"
//           . "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>"
//           . "<p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>";

//     if (!mail($to, $subject, $body, $headers)) {
//         header("Location: index.php?error=" . urlencode("Email sending failed"));
//         exit;
//     }
// } else {
//     require 'vendor/autoload.php';

//     // No "use" keyword in PHP 5.3 → use full namespace
//     $mail = new PHPMailer\PHPMailer\PHPMailer(true);

//     try {
//         $mail->isSMTP();
//         $mail->Host = 'smtp.gmail.com';
//         $mail->SMTPAuth = true;
//         $mail->Username = 'your@gmail.com';
//         $mail->Password = 'your_app_password';
//         $mail->SMTPSecure = 'tls';
//         $mail->Port = 587;

//         $mail->setFrom('no-reply@yourdomain.com', 'Zesty Bites Website');
//         $mail->addAddress($owner_email);
//         if ($email) $mail->addReplyTo($email, $name);

//         $mail->isHTML(true);
//         $mail->Subject = "New Booking from {$name}";
//         $mail->Body = "<h3>New Booking / Contact</h3>
//                        <p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>
//                        <p><strong>Mobile:</strong> " . htmlspecialchars($mobile) . "</p>
//                        <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
//                        <p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>";

//         $mail->send();
//     } catch (Exception $e) {
//         header("Location: index.php?error=" . urlencode("Email sending failed: " . $mail->ErrorInfo));
//         exit;
//     }
// }

header("Location: index.php?success=1");
exit;
?>
