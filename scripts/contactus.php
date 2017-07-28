<?php
if(isset($_POST['emailaddress'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $to = "cowens@reachnative.com";
    $subject = "New Message from Contact Page";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['firstname']) ||
        !isset($_POST['lastname']) ||
        !isset($_POST['emailaddress']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }



    $first_name = $_POST['firstname']; // required
    $last_name = $_POST['lastname']; // required
    $email_from = $_POST['emailaddress']; // required
    $comments = $_POST['message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }

  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }

  if(strlen($comments) < 2) {
    $error_message .= 'The message you entered does not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $message = "A new submission from Contact Us has been submitted. Here are the details:\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $message .= "First Name: ".clean_string($first_name)."\n";
    $message .= "Last Name: ".clean_string($last_name)."\n";
    $message .= "Email: ".clean_string($email_from)."\n";
    $message .= "Message: ".clean_string($comments)."\n";

// create email headers
$headers = 'From: Sulphur Springs UMC <debbie@sulphurspringsumc.com>' . '\r\n' .
'Reply-To: debbie@sulphurspringsumc.com'. "\r\n";

if (mail($to, $subject, $message, $headers)) {
      echo "<script>$(''.success').show('Your message was successfully sent.');</script>";
    } else {
      echo "<script>alert('Mail was not sent. Please try again later');</script>";
    }
  }
?>
