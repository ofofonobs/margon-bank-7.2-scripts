<?php
 
class EasyContact
{
	  
	 
	public $field = array();
	public $hasFileUpload = false;
	
	public function __construct()
	{
	}
	
	
	public function createTextBox($varName, $labelName, $required, $maxCharacter)
	{
		if ($varName != 'email' || $varName != 'subject' || $varName != 'locationDetection')
			$this->field[$varName] = array("type" => "text", "value" => "", "labelName" => $labelName, "required" => $required, "errorMessage" => "", "maxCharacter" => $maxCharacter);
		
	}
	
	public function createEmail($labelName, $maxCharacter)
	{
		
		$this->field['email'] = array("type" => "text", "value" => "", "labelName" => $labelName, "required" => true, "errorMessage" => "", "maxCharacter" => $maxCharacter);
		//array_push($this->field, $varName => array("type" => "text", "value" => "", "labelName" => $labelName, "required" => $required, "errorMessage" => "", "maxCharacter" => $maxCharacter));
	
	}
	
	public function createSubject($labelName, $required, $maxCharacter)
	{
		
		$this->field['subject'] = array("type" => "text", "value" => "", "labelName" => $labelName, "required" => $required, "errorMessage" => "", "maxCharacter" => $maxCharacter);
		//array_push($this->field, $varName => array("type" => "text", "value" => "", "labelName" => $labelName, "required" => $required, "errorMessage" => "", "maxCharacter" => $maxCharacter));
	
	}
	
	
	public function createTextArea($varName, $labelName, $required, $maxCharacter)
	{
		if ($varName != 'email' || $varName != 'subject' || $varName != 'locationDetection')
			$this->field[$varName] = array("type" => "textarea", "value" => "", "labelName" => $labelName, "required" => $required, "errorMessage" => "", "maxCharacter" => $maxCharacter);
		
	}
	
	public function createComboBox($varName, $labelName, $required)
	{
		if ($varName != 'email' || $varName != 'subject' || $varName != 'locationDetection')
			$this->field[$varName] = array("type" => "combo", "value" => "", "labelName" => $labelName, "required" => $required, "errorMessage" => "", "items" => array());
		
	}
	
	public function addComboBoxOption($varName, $item)
	{
		if ($varName != 'email' || $varName != 'subject' || $varName != 'locationDetection')
		{
			array_push($this->field[$varName]["items"], $item);
			
		}
	}
	
	public function createRadioButton($varName, $labelName, $required)
	{
		if ($varName != 'email' || $varName != 'subject' || $varName != 'locationDetection')
			$this->field[$varName] = array("type" => "radio", "value" => "", "labelName" => $labelName, "required" => $required, "errorMessage" => "", "items" => array());
		
	}
	
	public function addRadioButtonOption($varName, $item)
	{
		if ($varName != 'email' || $varName != 'subject' || $varName != 'locationDetection')
			array_push($this->field[$varName]["items"], $item);
	}
	
	public function createCheckBox($varName, $labelName, $required)
	{
		if ($varName != 'email' || $varName != 'subject' || $varName != 'locationDetection')
			$this->field[$varName] = array("type" => "checkbox", "value" => array(), "labelName" => $labelName, "required" => $required, "errorMessage" => "", "items" => array());
		
	}
	
	public function addCheckBoxOption($varName, $item)
	{
		if ($varName != 'email' || $varName != 'subject' || $varName != 'locationDetection')
			array_push($this->field[$varName]["items"], $item);
	}
	
	public function createLocationDetection($labelName, $display)
	{
		$ipCountry = $this->getLocationInfoByIp();
		$this->field['locationDetection'] = array("type" => "locationDetection", "value" => $ipCountry['city'].', '.$ipCountry['country'], "labelName" => $labelName, "required" => false, 'display' => $display);
	}
	public function createCaptcha($labelName, $captchaType)
	{
		$this->field["captcha"] = array("type" => "captcha", "value" => "", "labelName" => $labelName, "required" => true, "errorMessage" => "", "captchaType" => $captchaType);
	
	}
	
	public function createFileUpload($varName, $labelName, $required, $byteSize, $fileExt)
	{
		if ($varName != 'email' || $varName != 'subject' || $varName != 'locationDetection')
			$this->field[$varName] = array("type" => "file", "value" => "", "labelName" => $labelName, "required" => $required, "errorMessage" => "", "byteSize" => $byteSize, "fileExt" => $fileExt, "description" => "");
		
		$this->hasFileUpload = true;	
	}
	
	public function showFileUploadDescription($varName, $desc)
	{
		if ($varName != 'email' || $varName != 'subject' || $varName != 'locationDetection')
			$this->field[$varName]["description"] = '<div class="fileUploadDesc">'.$desc.'</div>';
	}
	
	
	public function createPhone($varName, $labelName, $required, $maxCharacter)
	{
		if ($varName != 'email' || $varName != 'subject' || $varName != 'locationDetection')
			$this->field[$varName] = array("field" => "phone" ,"type" => "text", "value" => "", "labelName" => $labelName, "required" => $required, "errorMessage" => "", "maxCharacter" => $maxCharacter);
		
	}
	
	public function createHTML($varName, $htmlText)
	{
		$this->field[$varName] = array("type" => "html", "value" => $htmlText);
	}
	
	public function isValidPhoneNumber($field)
	{
		if (!preg_match("/^(\+)?(([0-9])+([. -])?)+([0-9])+$/",$field)) {
		  	return FALSE;
		}
		else
			return TRUE;
		
	}
	
	public function isValidEmail($field) 
	{
		if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9-])+(\.[a-zA-Z0-9-]+)+$/",$field)) {
		  	return FALSE;
		}
		else
			return TRUE;
	}

	public function bytesConverter($bytes)
	{
		$sizeName = array('bytes', 'kb','mb', 'gb');
		$counter = 0;
		
		$fBytes = floatVal($bytes);
		
		for ($x = 0; $x < 4; $x++)
		{
			if ($fBytes >= 1000)
			{
				$fBytes = $fBytes / 1000;
				$counter++;
			}
			else
				$x = 4;
		
		}
		
		return number_format($fBytes, 1).$sizeName[$counter];
	}
	
	public function genTextCap() {
		session_start();
		$num1=rand(0,89);
		$num2=rand(0,9);
		$_SESSION['code'] = $num1 + $num2;
		if (rand(0,1) == 0)
			$code = $num1." + ".$num2;
		else
			$code = $num2."  + ".$num1;
			
		return $code;
	}
	
	public function getLocationInfoByIp()
	{
		$client = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote = @$_SERVER['REMOTE_ADDR'];
		$result = array('country' => '','city' => '','ip' => '');
		if (filter_var($client, FILTER_VALIDATE_IP))
			$ip = $client;
		else if (filter_var($forward, FILTER_VALIDATE_IP))
			$ip = $forward;
		else
			$ip = $remote;
	
		$ip_data = '';
		//Curl check
		if (function_exists('curl_version'))
		{	
			$easy_curl = curl_init();
			curl_setopt ($easy_curl, CURLOPT_URL, 'http://www.geoplugin.net/json.gp?ip=' . $ip);
			curl_setopt ($easy_curl, CURLOPT_RETURNTRANSFER, 1);
			
			$easy_curl_return = curl_exec($easy_curl);
			$ip_data = @json_decode($easy_curl_return);
			curl_close($easy_curl);
		}
		else if( ini_get('allow_url_fopen') ) {
		   $ip_data = @json_decode(file_get_contents('http://www.geoplugin.net/json.gp?ip=' . $ip));
		}
		
		
		if ($ip_data && $ip_data->geoplugin_countryName != null)
		{
			$result['country'] = $ip_data->geoplugin_countryCode;
			$result['city'] = $ip_data->geoplugin_city;
			$result['ip'] = $ip;
		}
	
		return $result;
	}
	
	
	public function displayField($varName, $successSent)
	{
		$holderField = $this->field[$varName];
		
		if ($holderField['type'] == 'text')
		{
			
			$errorAst = '';
			$value = '';
			$errorMessage = '';
			
			if ($holderField['required']) 
				$errorAst = '<span class="errorAst">*</span>';
			if (!$successSent) 
				$value = 'value="'.htmlspecialchars($holderField['value']).'"';
			if ($holderField['errorMessage'] != '') 
				$errorMessage = '<div class="errorText">'.htmlspecialchars($holderField['errorMessage']).'</div>'; 
			
			echo '
			<div class="field">			
				<label for="'.$varName.'">'.$errorAst.$holderField['labelName'].':</label>
				<input class="res" name="'.$varName.'" type="text" id="'.$varName.'" '.$value.' />
				'.$errorMessage.'		
			</div>
			';
		
		}
		else if ($holderField['type'] == 'textarea')
		{
			$errorAst = '';
			$value = '';
			$errorMessage = '';
			
			if ($holderField['required']) 
				$errorAst = '<span class="errorAst">*</span>';
			if (!$successSent) 
				$value = htmlspecialchars($holderField["value"]);
			if ($holderField['errorMessage'] != '') 
				$errorMessage = '<div class="errorText">'.htmlspecialchars($holderField['errorMessage']).'</div>'; 
			
			
			echo '
			<div class="field">		
				<label for="'.$varName.'">'.$errorAst.$holderField['labelName'].':</label>
				<textarea class="res" name="'.$varName.'"  rows="5" id="'.$varName.'" >'.$value.'</textarea>
				'.$errorMessage.'		
			</div>
			';
		}
		else if ($holderField['type'] == 'combo')
		{
			$errorAst = '';
			$value = '';
			$errorMessage = '';
			
			if ($holderField['required']) 
				$errorAst = '<span class="errorAst">*</span>';
			if (!$successSent) 
				$value = htmlspecialchars($holderField["value"]);
			if ($holderField['errorMessage'] != '') 
				$errorMessage = '<div class="errorText">'.htmlspecialchars($holderField['errorMessage']).'</div>'; 
			
			echo '
			<div class="field">		
				<label for="'.$varName.'">'.$errorAst.$holderField['labelName'].':</label>
				<select class="res" id="'.$varName.'" name="'.$varName.'"  >';
				
				foreach ($holderField['items'] as $item) {
				  if ($value == $item)
				  	echo '<option value="'.$item.'" selected>'.$item.'</option>'; 
				  else
				      	echo '<option value="'.$item.'">'.$item.'</option>'; 
				}
			
			echo '	</select>
				'.$errorMessage.'		
			</div>';
			
			
		}
		else if ($holderField['type'] == 'radio')
		{
			$errorAst = '';
			$value = '';
			$errorMessage = '';
			
			if ($holderField['required']) 
				$errorAst = '<span class="errorAst">*</span>';
			if (!$successSent) 
				$value = htmlspecialchars($holderField["value"]);
			if ($holderField['errorMessage'] != '') 
				$errorMessage = '<div class="errorText">'.htmlspecialchars($holderField['errorMessage']).'</div>'; 
			
			
			
			echo '
			<div class="field">			
				<label>'.$errorAst.$holderField['labelName'].':</label>
				<div style="display:inline-block;">';
				
				foreach ($holderField['items'] as $item) {
				  if ($value == $item)
				  	echo '<input name="'.$varName.'" type="radio" value="'.$item.'" checked />'.$item.'<br/>';
				  else
				      	echo '<input name="'.$varName.'" type="radio" value="'.$item.'" />'.$item.'<br/>';
				}
			
			echo '	</div>
				'.$errorMessage.'		
			</div>';
			
			
		}
		else if ($holderField['type'] == 'checkbox')
		{
			$errorAst = '';
			$value = array();
			$errorMessage = '';
			
			if ($holderField['required']) 
				$errorAst = '<span class="errorAst">*</span>';
			if (!$successSent) 
				$value = $holderField['value'];
			if ($holderField['errorMessage'] != '') 
				$errorMessage = '<div class="errorText">'.htmlspecialchars($holderField['errorMessage']).'</div>'; 
			
			
			echo '
			<div class="field">			
				<label>'.$errorAst.$holderField['labelName'].':</label>
				<div style="display:inline-block;">';
				
				$valueCount = count($value);
				
				foreach ($holderField['items'] as $item) {
					//check if item is found in value array
					if ($valueCount == 0)
					  	echo '<input name="'.$varName.'[]" type="checkbox" value="'.$item.'" />'.$item.'<br/>';
					else
					{
						if (in_array($item, $value, TRUE))
						  	echo '<input name="'.$varName.'[]" type="checkbox" value="'.$item.'" checked />'.$item.'<br/>';
						else
							echo '<input name="'.$varName.'[]" type="checkbox" value="'.$item.'" />'.$item.'<br/>';
					}
				}
			
			echo '	</div>
				'.$errorMessage.'		
			</div>';
			
			
		}
		else if ($holderField['type'] == 'captcha')
		{
			$errorAst = '';
			$value = '';
			$errorMessage = '';
			
			if ($holderField['required']) 
				$errorAst = '<span class="errorAst">*</span>';
			if (!$successSent) 
				$value = htmlspecialchars($holderField["value"]);
			if ($holderField['errorMessage'] != '') 
				$errorMessage = '<div class="errorText">'.htmlspecialchars($holderField['errorMessage']).'</div>'; 
			
			
			echo '
			<div class="field">			
				<label for="'.$varName.'">'.$errorAst.$holderField['labelName'].':</label>
				<input id='.$varName.' name='.$varName.' type="text"  value=""/>
				';
				
				if($holderField['captchaType']== 'text') 
					echo '<input id="genCaptcha" name="genCaptcha" value="'.$this->genTextCap().'" disabled size="6"/>'; 
				else if ($holderField['captchaType'] == 'image') 
					echo '<img id="captchaImg" src="easy_contact/inc/captcha.php" alt="captchaImg" />';
				
		
			
			echo '
				'.$errorMessage.'		
			</div>';
			
			
		}
		else if ($holderField['type'] == 'locationDetection')
		{
			if ($holderField['display'] == true)
			{
				echo '
				<div style="text-align: center;"><b>'.$holderField['labelName'].':</b> '.$holderField['value'].'</div>
				';
			}
		}
		else if ($holderField['type'] == 'file')
		{
			
			$errorAst = '';
			$errorMessage = '';
			
			if ($holderField['required']) 
				$errorAst = '<span class="errorAst">*</span>';
			if ($holderField['errorMessage'] != '') 
				$errorMessage = '<div class="errorText">'.htmlspecialchars($holderField['errorMessage']).'</div>'; 
			
			echo '
			<div class="field">			
				<label for="'.$varName.'">'.$errorAst.$holderField['labelName'].':</label>
				<input class="res" name="'.$varName.'" type="file" id="'.$varName.'"  />
				'.$holderField['description'].'
				'.$errorMessage.'		
			</div>
			';
		
		}
		else if ($holderField['type'] == 'html')
		{
			echo $holderField['value'];
		}
		
		
			
	
	
	}
	
}

?>