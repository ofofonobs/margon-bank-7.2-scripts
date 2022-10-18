<?php

	//session_start();
	$successSent = false;
	
	if (!isset($_POST["submit"])) {
    		
	}
	else
	{
		$hasErrors = false;
		$hasSubject = false;
		$subject = $defaultSubject;
		foreach ($easyForm->field as $varName => $arrValue) {
			
			if ($easyForm->field[$varName]['type'] == 'checkbox')
			{	
				if (isset($_POST[$varName]))
				$easyForm->field[$varName]['value'] = $_POST[$varName];
			
			}
			else if ($easyForm->field[$varName]['type'] == 'file')
			{
				if (isset($_FILES[$varName]))
					$easyForm->field[$varName]['value'] = $_FILES[$varName];
			}
			else if ($easyForm->field[$varName]['type'] == 'locationDetection')
			{}
			else if ($easyForm->field[$varName]['type'] == 'html')
			{}
			else
			{	//isset(
				if (isset($_POST[$varName]))
					$easyForm->field[$varName]['value'] = trim($_POST[$varName]);
			}
			
			
			if (isset($easyForm->field[$varName]['required']))	
			{
				if ($easyForm->field[$varName]['required'] == true)
				{	
					//check for empty field
					if (empty($easyForm->field[$varName]['value']))
						$easyForm->field[$varName]['errorMessage'] = $emptyField;
						
					//check for empty file upload
					if ($easyForm->field[$varName]['type'] == 'file')
					{
						if (empty($easyForm->field[$varName]['value']['name']))
							$easyForm->field[$varName]['errorMessage'] = $emptyField;
					}
				}
			}
			
			if ($easyForm->field[$varName]['type'] == 'text' || $easyForm->field[$varName]['type'] == 'textarea')
			{	
				//Check for max allowed character
				if (strlen($easyForm->field[$varName]['value']) > $easyForm->field[$varName]['maxCharacter'] && $easyForm->field[$varName]['value'] != '')
				{	
					$easyForm->field[$varName]['errorMessage'] = $maxAllowedCharacter.$easyForm->field[$varName]['maxCharacter'];
					
				}
			}
			
			if ($easyForm->field[$varName]['type'] == 'file')
			{
				if (isset($_FILES[$varName]))
				{
					$fileNameArray = explode(".", $_FILES[$varName]['name']);
					$fileNameExt = "";
					$totalFileName = Count($fileNameArray);
					
					if (isset($fileNameArray[$totalFileName - 1]))
						$fileNameExt = strtolower($fileNameArray[$totalFileName - 1]);
				
					$allowedFileExts = $easyForm->field[$varName]['fileExt'];
					
					if ($easyForm->field[$varName]['errorMessage'] == '' && !empty($easyForm->field[$varName]['value']['name']))
					{
						if (!in_array($fileNameExt, $allowedFileExts)) {
							$easyForm->field[$varName]['errorMessage'] = $fileNameExt .' - ' . $invalidFileExtension;
						
						}
						
						if($_FILES[$varName]['size'] > $easyForm->field[$varName]['byteSize'])
						{
							$easyForm->field[$varName]['errorMessage'] = $maxAllowedFileSize .$easyForm->bytesConverter($easyForm->field[$varName]['byteSize']);
						} 
					}
				}
			}
			
			
	
			if (isset($easyForm->field[$varName]['field']))
			{
				if ($easyForm->field[$varName]['field'] == 'phone')
				{		
					//check for valid email address
					if (!$easyForm->isValidPhoneNumber($easyForm->field[$varName]['value']) && $easyForm->field[$varName]['value'] != '')
						$easyForm->field[$varName]['errorMessage'] = $invalidPhoneNumber;
					
				}	
	  		}
	  		
			
			if ($varName == 'email')
			{		
				//check for valid email address
				if (!$easyForm->isValidEmail($easyForm->field['email']['value']) && $easyForm->field['email']['value'] != '')
		  			$easyForm->field['email']['errorMessage'] = $invalidEmail;
	  		}	
		  	if ($varName == 'captcha')
			{	
				//check for correct captcha code
				if($_SESSION['code'] != $easyForm->field['captcha']['value'] && $easyForm->field['captcha']['value'] != '')
					$easyForm->field['captcha']['errorMessage'] = $invalidCaptcha;
	  		}
	  		
	  		if ($varName == 'subject')
	  			$subject = $easyForm->field['subject']['value'];
	  		
				
						
			if (isset($easyForm->field[$varName]['errorMessage']))	
			{
				if ($easyForm->field[$varName]['errorMessage'] != "")
					$hasErrors = true;
			}
		}
		
		
		$completeMessage = '';
	  	$contMessage = '';
	  	
	  	
	  	
				
		if ($hasErrors == false)
		{      
			
			/* ============  TEMPLATE STYLE: MESSAGE YOU RECEIVED  =========== */
			$completeMessage .= '<table>';
	  		foreach ($easyForm->field as $varName => $arrValue) {
	  			if ($easyForm->field[$varName]['type'] != 'textarea' && $varName != 'captcha' && $varName != 'email' && $varName != 'subject' && $easyForm->field[$varName]['type'] != 'file' && $easyForm->field[$varName]['type'] != 'html')
	  			{
	  				if ($easyForm->field[$varName]['type'] == 'checkbox')
	  				{
	  					$checkBoxValues = '';
	  					if (count($easyForm->field[$varName]['value']) != 0)
	  					{
	  						$totalCheckBoxItems = count($easyForm->field[$varName]['value']);
	  						
	  						for ($x = 0; $x < $totalCheckBoxItems; $x++)
	  						{
	  							if ($x == $totalCheckBoxItems - 1) //last index
	  								$checkBoxValues .= $easyForm->field[$varName]['value'][$x];
	  							else
	  								$checkBoxValues .= $easyForm->field[$varName]['value'][$x].', ';
	  							
	  						}
	  						
		  					/*foreach ($easyForm->field[$varName]['value'] as $value) {
		  						$checkBoxValues .= $value.' ,';
		  					}*/
	  					}
	  					$completeMessage .= '<tr><td><b>'.$easyForm->field[$varName]['labelName'].'</b></td><td><span style="margin-left:15px;">'.$checkBoxValues.'</span></td></tr>';
	  				
	  				}
	  				else
	  					$completeMessage .= '<tr><td><b>'.$easyForm->field[$varName]['labelName'].'</b></td><td><span style="margin-left:15px;">'.$easyForm->field[$varName]['value'].'</span></td></tr>';
			  		
	  			}
	  			if ($easyForm->field[$varName]['type'] == 'textarea')
	  			{
	  				$wrapMessage = wordwrap($easyForm->field[$varName]['value'], 70);
	  				$contMessage .= '<br/><h2>'.$easyForm->field[$varName]['labelName'].':</h2>'.nl2br($wrapMessage).'<br/>';
	  			}
	  			
	  			
	  		}
	  		$completeMessage .= '</table>';
	  		$completeMessage .= $contMessage;
	  		
	  		/*End of Template*/
	  		
			
	  		
			
			$userEmail = $easyForm->field['email']['value'];
			
			/******  SENDING EMAIL  ******/
			$phpMailer->From = $userEmail;
			$arrEmail = explode('@', $phpMailer->From);
			$phpMailer->FromName = $arrEmail[0];  
			if ($smtpEnable)
				$phpMailer->AddAddress($smtpUsername);
			else
				$phpMailer->AddAddress($yourEmail);
			$phpMailer->Subject = $subject;
			$phpMailer->Body    = $completeMessage;
			
			
			if ($easyForm->hasFileUpload)
			{
				foreach ($easyForm->field as $varName => $arrValue) 
				{
					if ($easyForm->field[$varName]['type'] == 'file')
					{
						if ($easyForm->field[$varName]['value'] && $easyForm->field[$varName]['value']['error'] == UPLOAD_ERR_OK) 
							$phpMailer->AddAttachment($easyForm->field[$varName]['value']['tmp_name'], $easyForm->field[$varName]['value']['name']);
				
					}
				}
			}
			
			$phpMailer->send();

			
			
			
			/* For Autoresponder */
			if ($autoResponder == true)
			{	
				
				
				$smtpMailResponder->AddAddress($userEmail);
				$smtpMailResponder->Subject = $respondSubject;
				$smtpMailResponder->Body    = nl2br($respondMessage);
					
				
				
				$smtpMailResponder->send();
				
				
			}
			
			
			
			$successSent = true;
			
			
			//Redirection
			if ($enableRedirection)
				echo '<script>location.href = "'.$redirectToURL.'"</script>';
		}
		else 
		{
			$successSent = false;
		
		}
		
	}



?>