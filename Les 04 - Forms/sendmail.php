<?php
$studentemail = htmlspecialchars($_POST['studentemail']);
$subject = empty(htmlspecialchars($_POST['subject'])) ? "No subject" : htmlspecialchars($_POST['subject']);
$message = empty(htmlspecialchars($_POST['message'])) ? "Default message" : htmlspecialchars($_POST['message']);
if (!empty($_POST['random'])) {
    $message .= " \r\n " . htmlspecialchars($_POST['random']);
}
if (!empty($_POST['date'])) {
    $message .= " \r\n " . htmlspecialchars($_POST['date']);
}
if (!empty($_POST['number'])) {
    $message .= " \r\n " . htmlspecialchars($_POST['number']);
}

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = empty(htmlspecialchars($_POST['email'])) ? 'From: Rcami <info@rcami.be>' : 'FROM: Sender <' . htmlspecialchars($_POST['email']) . '>';
//$headers[] = 'Cc: ccmail@yourdomain.be';
// using mail function and returns boolean
$send = mail($studentemail, $subject, $message, implode("\r\n", $headers));
if ($send) {
$response = "Mail sent successfully";
} else {
$response = "Mail not sent";
}
echo json_encode($response);
?>