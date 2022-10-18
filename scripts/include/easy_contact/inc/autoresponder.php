<?php

/* Email address used to send auto respond email*/
/* Change this to your email address		*/
$emailResponder = 'no-reply@codeadik.com';


//You only need to configure smtp responder settings if $smtpEnable is set to true in config.php
$smtpServerResponder = "server.mailexample.com";   
$smtpPortResponder = 465;                    
$smtpUsernameResponder = "no-reply@codeadik.com"; 
$smtpPasswordResponder = "PassWoRD";
$smtpEncryptionResponder = 'ssl';  
//End smtp responder settings


/* autoresponder subject */
$respondSubject = 'Thank you for contacting us!';


/* autoresponder message */
/* This accepts multi-language and html format */
$respondMessage = '
Hello!

Thank you for contacting us! We appreciate your taking 
the time to contact us. If your message requires a response, 
we will get back to you as soon as we can.



<b>This is only a demo response message.</b>
<a href="http://goo.gl/QIXtLh">Download Contact Form Here</a>


Yours sincerely,

Your name
www.codeadik.com
';







	/*Don't Change below code. 
	This may bypass spamfilter and delivered the mail in inbox*/
	$respondMessage .= '<br/><br/>Date Received: '. date("m-d-Y H:i:s");
	
	/* Note: Don't change the configuration below */
	$smtpMailResponder = new PHPMailer();
	if ($smtpEnable)
		$smtpMailResponder->isSMTP();                                     
	$smtpMailResponder->Host = $smtpServerResponder;  
	$smtpMailResponder->Port = $smtpPortResponder;
	$smtpMailResponder->SMTPAuth = true;    
	$smtpMailResponder->Username = $smtpUsernameResponder; 
	$smtpMailResponder->Password = $smtpPasswordResponder;                          
	$smtpMailResponder->SMTPSecure = $smtpEncryptionResponder;   
	if ($smtpEnable)                      
		$smtpMailResponder->From = $smtpUsernameResponder;
	else
		$smtpMailResponder->From = $emailResponder;
	$smtpArrEmail = explode('@', $smtpMailResponder->From);
	$smtpMailResponder->FromName = $smtpArrEmail[0];
	$smtpMailResponder->isHTML(true);
	$smtpMailResponder->CharSet = 'UTF-8';

				
?>