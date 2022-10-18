<?php

	
	if ($validFormDisplay)
	{
	

		echo '
		<div id="contactForm">
			<div class="header">Contact Us - Online Banking</div> 
		
			<div class="body">';
			if ($successSent) echo '<div id="successMessage">'.$successMessage.'</div>';
		
		echo '
			<div class="desc">Use this form to get in touch with us. Please fill in the required field <span style="color:red">*</span></div><br />
			<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="post"  '.$formEnctype.'  >';
			
			foreach ($easyForm->field as $varName => $arrValue) {
					$easyForm->displayField($varName, $successSent);
			}
		
		echo '
				
				<br/>
				<input name="submit" type="submit" id="submit" value="Submit" />
				<br/>
				<br/>
			</form>
			</div> 
		</div>';		
		
	
	
	}
	else
	{
		echo "This is not the form!";
	}


?>





	