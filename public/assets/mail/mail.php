<?
$name = $_POST{'name'};
$phone = $_POST{'phone'};
$email = $_POST{'email'};
$subject = $_POST{'subject'};
$message = $_POST['message'];

$email_message = "

Name: ".$name."
Phone: ".$phone."
Email: ".$email."
Subject: ".$subject."
Message: ".$message."

";

mail ("example@gmail.com" , "New Message", $email_message);
header("location: ../../mail-success.html");
?>


