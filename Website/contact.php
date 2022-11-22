<?php
if (empty($_POST['email']) || empty($_POST['message'])) {
    die('Please fill the required fields.');
}
$name = empty(htmlspecialchars($_POST['name'])) ? "Unknown" : htmlspecialchars($_POST['name']);
$from = htmlspecialchars($_POST['email']);
$subject = empty(htmlspecialchars($_POST['subject'])) ? "No subject" : htmlspecialchars($_POST['subject']);


$message = '<html><body><table border="2"><tr><th>Name</th><td>';
$message .= $name . '</td></tr>';


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
$headers[] = 'From: ' . $name . ' <' . $from . '>';
//$headers[] = 'Cc: ccmail@yourdomain.be';
// using mail function and returns boolean
$send = mail('r0463108@student.thomasmore.be', $subject, $message, implode("\r\n", $headers));
if ($send) {
$response = "Mail sent successfully";
} else {
$response = "Mail not sent";
}
echo json_encode($response);
?>