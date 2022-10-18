<?php
/*******************************************************************
* Copyright 2015 Codeadik All rights reserved.
* Item: Easy PHP Contact Form Script
******************************************************************/

	include dirname(__FILE__) . '/class/EasyContact.class.php';
	
	
	/* ======  SETTINGS FOR CONTACT FORM ===== */
	
	/* Put your email here.  Ex: yoursiteemail@domain.com */
	$yourEmail = 'shipon'; 
	
	$contactTemplate = 'aqua';
	
	$autoResponder = true;
	
	$defaultSubject = 'Support from codeadik.com';
	
	
	/* =====  Redirection Configuration after Successful Submission - (Uses Javascript) ===== */
	//If $enableRedirection is true, it redirects to specific URL specify in $redirectToURL. 
	//If $enableRedirection is false, it will display ($successMessage) on the same page of contact form.
	$enableRedirection = false;
	
	$redirectToURL = 'buyscripts.world';
	 
	$successMessage = 'Thank you, your message has been sent';
	
	
	
	
	/* =====  Error Message Configuration  ===== */
	$emptyField = 'This field is required';
	
	$invalidEmail  = 'Invalid email address format!';
	
	$invalidCaptcha = 'Please enter the correct captcha code!';
	
	$maxAllowedCharacter = 'Maximum allowed character is ';
	
	$invalidFileExtension = 'file extension is not allowed';
	
	$maxAllowedFileSize = 'The file size exceeds more than ';
	
	$invalidPhoneNumber = 'Invalid phone number, only accepts digits and phone characters';
	
	
	
	
	/* Settings for SMTP Authentication - See Documentation for more Details*/
	/* Set to true if you want SMTP Authentication for sending email.
	/* Set to false if you want to use the default PHP mail() for sending email */
	$smtpEnable = true;
	
	/* If you enable the SMTP authentication, you must configure the data below */
	$smtpServer = 'mail.digitalforestservers.com.ng';   
	$smtpPort = 465;                    
	$smtpUsername = 'morgan@digitalforestservers.com.ng'; 
	$smtpPassword = 'o=DR!MRK)C43';  
	$smtpEncryption = 'ssl';               
	/* End of SMTP Authentication configuration */




	
	
	
	/* =====  Our Easy PHP Contact Form class  ===== */
	$easyForm = new EasyContact;
	 
	/* =====  Customize your form below. See the documentation included  ===== */
	/* =====  Add many fields as you want  ===== */
	/* =====  They are displayed according to their arrangement here  ===== */
	
	$easyForm->createTextBox('fullname', 'Full Name', false, 70);
	$easyForm->createEmail('Email', 70);
	
	$easyForm->createPhone('telephone', 'Tel. Number', true, 20);
	
	$easyForm->createComboBox('dep', 'Department', true);
		$easyForm->addComboBoxOption('dep', 'Sales');
		$easyForm->addComboBoxOption('dep', 'General');
		
	$easyForm->createRadioButton('gender', 'Gender', true);
		$easyForm->addRadioButtonOption('gender', 'Male');
		$easyForm->addRadioButtonOption('gender', 'Female');
	
	$easyForm->createCheckBox('browser', 'Browser Compatibility', true);
		$easyForm->addCheckBoxOption('browser', 'Google Chrome');
		$easyForm->addCheckBoxOption('browser', 'Mozilla Firefox');
		$easyForm->addCheckBoxOption('browser', 'Opera');
		$easyForm->addCheckBoxOption('browser', 'IE');
				
	$easyForm->createSubject('Subject', true, 70);
	
	$easyForm->createTextArea('message', 'Message', true, 5000);
	
	//byte size conversion: 1000 bytes = 1kb, 1000000 bytes = 1mb, 1000000000 = 1gb
	$easyForm->createFileUpload('imgfile', 'Upload File', false, 1500000, array('png', 'jpg', 'jpeg', 'gif') );
		$easyForm->showFileUploadDescription('imgfile', 'Accepted Extension: png, jpg, jpeg, gif and up to 1.5mb');
	
	$easyForm->createFileUpload('document', 'Upload File', false, 165000, array('txt') );
	
	$easyForm->createTextArea('quote', 'Give your Quote', true, 5000);
	
	$easyForm->createTextArea('quote2', 'Last Quote', true, 5000);
	
	$easyForm->createCaptcha('Enter Captcha Code', 'image');
	

	$easyForm->createLocationDetection('Location', true);
	
	//New Feature in v2.3!
	$easyForm->createHTML('html_1', '<p>You can <b>add</b> you custom HTML</p>');
	
	
	
	
	/* END OF CREATING FIELDS */











	/* Note: Don't change the configuration below */
	session_start(); 
	$validFormDisplay = true;
	include dirname(__FILE__) . '/class/class.phpmailer.php';
	$phpMailer = new PHPMailer();
	if ($smtpEnable)
		$phpMailer->isSMTP();                                     
	$phpMailer->Host = $smtpServer;  
	$phpMailer->Port = $smtpPort;
	$phpMailer->SMTPSecure = $smtpEncryption;
	$phpMailer->SMTPAuth = true;               
	$phpMailer->Username = $smtpUsername;     
	$phpMailer->Password = $smtpPassword;                          
	$phpMailer->isHTML(true); 
	$phpMailer->CharSet = 'UTF-8';
	
	$formEnctype = '';
	if ($easyForm->hasFileUpload)
		$formEnctype = 'enctype="multipart/form-data"';
	
	include dirname(__FILE__) . '/autoresponder.php';
	include dirname(__FILE__) . '/process.php';
?>