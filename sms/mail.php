<?php
  include "connect.php";
  if(isset($_POST['submit']))
  {
	  $name=$_POST['$name'];
	  $phone=$_POST['$phone'];
	  $email=$_POST['$email'];
	  $msg=$_POST['$msg'];
	  $code=$_POST['$code'];
	  $to="admin@gmail.com";
	  $subject="A new enquiry";
	  $body="Name=".$name."<br>";
	  $body.="phone=".$phone."<br>";
	  $body.="email=".$email."<br>";
	  $body.="message=".$msg;
	  $header="MIME_version:1.0.\"r\"n";
	  $header.="content-type:html\text;charset=UTF-8";
      if(mail($to,$subject,$msg,$header))
		 header("location:contact.php?m=message sent");
	  else
		 header("location:contact.php?m=mesage sending failed");
  }
?>
	  