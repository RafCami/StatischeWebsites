<?php
$studentemail = htmlspecialchars($_POST['studentemail']);
$subject = empty(htmlspecialchars($_POST['subject'])) ? "No subject" : htmlspecialchars($_POST['subject']);
$message = '<html><body><table border="2"><tr><th>Message</th><td>';
$message .= empty(htmlspecialchars($_POST['message'])) ? "Default message" : htmlspecialchars($_POST['message']);
$message .= "</td></tr>";
if (!empty($_POST['random'])) {
    $message .= "<tr><th>Random</th><td>" . htmlspecialchars($_POST['random']) . "</td></tr>";
}
if (!empty($_POST['date'])) {
    $message .= "<tr><th>Date</th><td>" . htmlspecialchars($_POST['date']) . "</td></tr>";
}
if (!empty($_POST['number'])) {
    $message .= "<tr><th>Number</th><td>" . htmlspecialchars($_POST['number']) . "</td></tr>";
}
$message .= '</table>';

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