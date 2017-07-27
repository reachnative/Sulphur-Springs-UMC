<?php

//define variables and set to empty values

$firstnameErr = $lastnameErr = $emailErr = $messageErr = "";
$firstname = $lastname = $emailaddress = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($POST["firstname"])) {
    $nameErr = "First name is required";

  } else {
    $firstname = text_input($_POST["firstname"]);
    //check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      $firstnameErr = "Only letters and white space is allowed.";
    }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($POST["lastname"])) {
      $nameErr = "Last name is required";

    } else {
      $lastname = text_input($_POST["lastname"]);
      //check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
        $lastnameErr = "Only letters and white space is allowed.";
      }
    }

  if (empty($_POST["emailaddress"])) {
   $emailErr = "Email is required.";
 } else {
   $emailaddress = test_input($_POST["emailaddress"]);
   // check if e-mail address is well-formed
   if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL)) {
     $emailErr = "Invalid email format.";
   }
 }

 //Submit form
?>
{% set sendTo = block.mailTo %}
<?php
 if (isset($_POST['submit'])) {
   $to = 'cowens@reachnative.com'; //Where to send the email to.
   $subject = 'New Message from Contact Form';
   $message = 'Here is the following information from the Contact Us form:' . "\r\n\r\n" . 'Name: ' . $_POST['firstname'] . " " . $_POST['lastname'] . "\r\n\r\n";
   $message = 'Email: ' . $_POST['emailaddress'] . "\r\n\r\n";
   $message = 'Message: ' . $_POST['message'];
 }

$headers = "From: debbie@sulphurspringsumc.com";
$headers = 'Content-Type: text/plain; charset=utf-8';

$email = filter_input(INPUT_POST, 'emailaddress', FILTER_VALIDATE_EMAIL);
if ($email) {
  $headers .= "\r\n\Reply-To: $email";
}

$success = mail($to, $subject, $message, $headers);
echo "Your Message successfully sent. Thank you!";

 ?>
