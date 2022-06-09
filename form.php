<?php

  if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $subject = $_POST['subject'];
  $mailfrom = $_POST['mail'];
  $message = $_POST['message'];


  //Server side validation
  //- no empty fields
  if(empty($name)||empty($mailfrom)||empty($subject)||empty($message)) {
      echo "All fields are mandatory! Please ensure you have filled out all parts of the form.";
      exit;
  }
  //- valid email address
  if (!filter_var($mailfrom, FILTER_VALIDATE_EMAIL)) {
      echo "Please ensure you have entered a valid email address.";
      exit;
  }

  $mailTo = "root@localhost";
  $headers = "From: ".$mailfrom;
  $txt = "You have recieved an email from ".$name.".\n\n".$message;

  mail($mailTo, $subject, $txt, $headers);
  header("Location: contact.html?.mailsend");

}
?>
