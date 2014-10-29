<?php
// check if fields passed are empty
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
	
// create email body and send it	
$to = 'eva.juric@scriba-office.de'; // put your email
$email_subject = "Contact form submitted by:  $name";
$email_body = "Sie haben eine neue Nachricht erhalten: \n\n".
				  "\nName: $name \n ".
				  "Email: $email_address\n". 
				  "Nachricht \n $message";
$headers = "From: contacts@scriba-office.com\n";
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>