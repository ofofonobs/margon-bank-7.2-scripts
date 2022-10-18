<?php
session_start();
include_once ('session.php');
require_once 'class.admin.php';
if(!isset($_SESSION['email'])){
	
header("Location: login.php");

exit(); 
}
require_once 'class.admin.php';

$reg_user = new USER();

if(isset($_GET['id'])){
	
$id=$_GET['id'];
$stmt = $reg_user->runQuery("SELECT * FROM account WHERE id='$id'");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if(isset($_POST['update']))
{	$fname = trim($_POST['fname']);
		
		
		$mname = trim($_POST['mname']);
		
		
		$lname = trim($_POST['lname']);
		
		
		$uname = trim($_POST['uname']);
		
		
		$upass = $_POST['upass'];
		
		$phone = trim($_POST['phone']);
		
		$email = trim($_POST['email']);
		
		$type = trim($_POST['type']);
		
		
		$work = trim($_POST['work']);
		
		
		$acc_no = trim($_POST['acc_no']);
		
		
		$addr = trim($_POST['addr']);

		
		$sex = trim($_POST['sex']);
		
		
		$dob = trim($_POST['dob']);
		
		
		$marry = trim($_POST['marry']);
		
		
		$t_bal = trim($_POST['t_bal']);
		
		
		$a_bal = trim($_POST['a_bal']);
		
	if($reg_user->update($fname,$mname,$lname,$uname,$upass,$phone,$email,$type,$work,$acc_no,$addr,$sex,$dob,$marry,$t_bal,$a_bal,$tax.$cot,$pin_auth))
	{
		$fname = trim($_POST['fname']);
		
		
		$mname = trim($_POST['mname']);
		
		
		$lname = trim($_POST['lname']);
		
		
		$uname = trim($_POST['uname']);
		
		
		$upass = $_POST['upass'];
		$upass = ($upass);
		
		$phone = trim($_POST['phone']);
		
		$email = trim($_POST['email']);
		
		$type = trim($_POST['type']);
		
		
		$work = trim($_POST['work']);
		
		
		$acc_no = trim($_POST['acc_no']);
		
		
		$addr = trim($_POST['addr']);

		
		$sex = trim($_POST['sex']);
		
		
		$dob = trim($_POST['dob']);
		
		
		$marry = trim($_POST['marry']);
		
		
		$t_bal = trim($_POST['t_bal']);
		
		
		$a_bal = trim($_POST['a_bal']);
		
		$cot = trim($_POST['cot']);
		
		
		$tax = trim($_POST['tax']);
		
		
		$imf = trim($_POST['imf']);
		
		$currency = trim($_POST['currency']);
		
		$pin_auth = $_POST['pin_auth'];
		
	    $pin = $_POST['pin'];
	    
	    $status = $_POST['status'];
		
	    $verify = $_POST['verify'];
	    
		
		
	
	$editaccount = $reg_user->runQuery("UPDATE account SET fname = '$fname', mname = '$mname', lname = '$lname', uname = '$uname', upass = '$upass', phone = '$phone', email = '$email', type = '$type', work = '$work', acc_no = '$acc_no', addr = '$addr', sex = '$sex', dob = '$dob', marry = '$marry', t_bal = '$t_bal', a_bal = '$a_bal', cot = '$cot', tax = '$tax', imf = '$imf', currency = '$currency', pin_auth = '$pin_auth', pin = '$pin', status = '$status', verify = '$verify'  WHERE id ='$id'");
	$editaccount->execute();
	
	
	



            $messag = "	
			


<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <title>[SUBJECT]</title>
  <style type='text/css'>
  body {
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   margin:0 !important;
   width: 100% !important;
   -webkit-text-size-adjust: 100% !important;
   -ms-text-size-adjust: 100% !important;
   -webkit-font-smoothing: antialiased !important;
 }
 .tableContent img {
   border: 0 !important;
   display: block !important;
   outline: none !important;
 }
 a{
  color:#382F2E;
}

p, h1{
  color:#382F2E;
  margin:0;
}

div,p,ul,h1{
  margin:0;
}
p{
font-size:13px;
color:#99A1A6;
line-height:19px;
}
h2,h1{
color:#444444;
font-weight:normal;
font-size: 22px;
margin:0;
}
a.link2{
padding:15px;
font-size:13px;
text-decoration:none;
background:#2D94DF;
color:#ffffff;
border-radius:6px;
-moz-border-radius:6px;
-webkit-border-radius:6px;
}
.bgBody{
background: #f6f6f6;
}
.bgItem{
background: #2C94E0;
}

@media only screen and (max-width:480px)
		
{
		
table[class='MainContainer'], td[class='cell'] 
	{
		width: 100% !important;
		height:auto !important; 
	}
td[class='specbundle'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		
	}
	td[class='specbundle1'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:20px !important;
		
	}	
td[class='specbundle2'] 
	{
		width:90% !important;
		float:left !important;
		font-size:14px !important;
		line-height:18px !important;
		display:block !important;
		padding-left:5% !important;
		padding-right:5% !important;
	}
	td[class='specbundle3'] 
	{
		width:90% !important;
		float:left !important;
		font-size:14px !important;
		line-height:18px !important;
		display:block !important;
		padding-left:5% !important;
		padding-right:5% !important;
		padding-bottom:20px !important;
	}
	td[class='specbundle4'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:20px !important;
		text-align:center !important;
		
	}
		
td[class='spechide'] 
	{
		display:none !important;
	}
	    img[class='banner'] 
	{
	          width: 100% !important;
	          height: auto !important;
	}
		td[class='left_pad'] 
	{
			padding-left:15px !important;
			padding-right:15px !important;
	}
		 
}
	
@media only screen and (max-width:540px) 

{
		
table[class='MainContainer'], td[class='cell'] 
	{
		width: 100% !important;
		height:auto !important; 
	}
td[class='specbundle'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		
	}
	td[class='specbundle1'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:20px !important;
		
	}		
td[class='specbundle2'] 
	{
		width:90% !important;
		float:left !important;
		font-size:14px !important;
		line-height:18px !important;
		display:block !important;
		padding-left:5% !important;
		padding-right:5% !important;
	}
	td[class='specbundle3'] 
	{
		width:90% !important;
		float:left !important;
		font-size:14px !important;
		line-height:18px !important;
		display:block !important;
		padding-left:5% !important;
		padding-right:5% !important;
		padding-bottom:20px !important;
	}
	td[class='specbundle4'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:20px !important;
		text-align:center !important;
		
	}
		
td[class='spechide'] 
	{
		display:none !important;
	}
	    img[class='banner'] 
	{
	          width: 100% !important;
	          height: auto !important;
	}
		td[class='left_pad'] 
	{
			padding-left:15px !important;
			padding-right:15px !important;
	}
		
	.font{
		font-size:15px !important;
		line-height:19px !important;
		
		}
}

</style>

<script type='colorScheme' class='swatch active'>
  {
    'name':'Default',
    'bgBody':'f6f6f6',
    'link':'ffffff',
    'color':'99A1A6',
    'bgItem':'2C94E0',
    'title':'444444'
  }
</script>

</head>
<body paddingwidth='0' paddingheight='0' bgcolor='#d1d3d4'  style=' margin-left:5px; margin-right:5px; margin-bottom:0px; margin-top:0px;padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;' offset='0' toppadding='0' leftpadding='0'>
  <table width='100%' border='0' cellspacing='0' cellpadding='0' class='tableContent bgBody' align='center'  style='font-family:Helvetica, Arial,serif;'>
  
    <!-- =============================== Header ====================================== -->

  <tr>
    <td class='movableContentContainer' >
    	<div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
        	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                   <tr>
                     <td valign='top'  colspan='3'>
                       <table width='600' border='0' bgcolor='white' cellspacing='0' cellpadding='0' align='center' valign='top' class='MainContainer'>
                         <tr>
                           <td align='left' valign='middle' width='200'>
                             <div class='contentEditableContainer contentImageEditable'>
                               <div class='contentEditable' >
                                 <img src='https://buyscriptsdemo.work/margonbank/assets/img/brand/blue.png' alt='' data-default='placeholder' data-max-width='100' width='118' height='80' >
							     <b style='font-size:1.5em; color:#fff;'></b>
                               </div>
                             </div>
                           </td>

                            
                         </tr>
                       </table>
                     </td>
                    </tr>
                </table>
        </div>
        <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'> </div>
        
        
        
      <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
        	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                  <tr>
                    <td>
                      <table width='600' border='0' cellspacing='0' cellpadding='0' align='center' valign='top' class='MainContainer'>
                        <tr>
                          <td>
                            <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>

                              <tr>
                                <td>
                                  <table width='600' border='0' cellspacing='0' cellpadding='0' align='center' class='MainContainer'>
                                    <tr><td style='border-bottom:1px solid #DDDDDD'></td></tr>
                                  </table>
                                </td>
                              </tr>

                              <tr>
                                <td valign='top' align='center'>
                                  <div class='contentEditableContainer contentTextEditable'>
                                    <div class='contentEditable' >
                                     
     <div class='contentEditableContainer contentTextEditable'>
                                    <div class='contentEditable' >
                                      <h3>Hello $fname</h3><br>
     <P style='font-size:15px;font-weight:normal;color:BLACK;'>Congratulations,Your Account have been approved<br>
        successfully <br>
        </P>
</div>
									 <div class='contentEditable' ><br>
                                      
                                    </div>
                                  </div>   <h3>Account Details</h3>                              <table style='border:1px solid black;padding:2px;' width='400'>
										
										<tr>
											<th style='text-align:left;'>Account Number</th>
											<td>$acc_no</td>
										</tr>
										
<tr>
											<th style='text-align:left;'>Account Password</th>
											<td>$upass</td>
										</tr>
                                        										<tr>
											<th style='text-align:left;'>Balance</th>
											<td>$currency $t_bal</td>
										</tr>
										<tr>
											<th style='text-align:left;'>Account Login Pin</th>
											<td>$pin_auth</td>
										</tr>
										<tr> 
											<th style='text-align:left;'>Pending Credit</th>
											<td>$currency 0.00</td>
										</tr>
										<tr style='background-color:#AA2E33;'>
											<th style='text-align:left; color:#fff;'>Available Balance</th>
											<td style='color:#fff;'>$currency $a_bal</td>
										</tr>
                                     </table>
                                    </div>
									 <div class='contentEditable' ><br>
                                      <p style='font-weight:bold;font-size:13px;line-height: 30px; color:#AA2E33;'>Please, note that your Internet Banking is automatically activated and you will need a combination of your account number and password to access your online banking.</p>
                                    </div>
                                  </div>
                                </td>
                              </tr>

                              <tr><td height='28'>&nbsp;</td></tr>
                              
                              <tr>
                                <td valign='top' align='center'>
                                  <div class='contentEditableContainer contentTextEditable'>
                                    <div class='contentEditable' >
                                      <p style=' font-weight:bold;font-size:13px;line-height: 30px;'>Margon Bankng Script.</p>
                                    </div>
    <br>                           <div class='contentEditableContainer contentTextEditable'>
                                    <div class='contentEditable' >
                                      <p style='#F00; font-size:13px;line-height: 15px;'>This message is sent to this email to $email <br /> <br /> <center><b>How do I know this is not a fake email?</b></center> <br />

An email really coming from us will address you by your registered first and last name or your business name. It will not ask you for sensitive information like your password, bank account or credit card details.<br /><br />
                                      </p>
                                      <p style='#F00; font-size:13px;line-height: 15px;'>Remember not to click any links in suspicious looking emails. </p>
                                    </div>
                                  </div>                               </div>
                                  <div class='contentEditableContainer contentTextEditable'>
                                    <div class='contentEditable' >
                                      <p style='color:#A8B0B6; font-size:13px;line-height: 15px;'>&nbsp;</p>
                                    </div>
                                  </div>
                                  <div class='contentEditableContainer contentTextEditable'>
                                  </div>
                                  <div class='contentEditableContainer contentTextEditable'>
                                    
                                  </div>
                                </td>
                              </tr>

                              <tr><td height='28'>&nbsp;</td></tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
        </div>
    </td>
  </tr>
</table>


  </body>
  </html>


";



            $subject = "Welcome $fname - Your Account Application Has Been Approved!"; 
            $send_otp_mobile = preg_replace('/[^0-9]/', '', $_POST['phone']);
            $reg_user->send_mail($email, $messag, $subject);
            //$reg_user->otp($send_otp_mobile, $subject);





            $msg1 = "
					<div class='alert alert-info'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong> Account Has Been Successfully Approved!
                   
			  		</div>
					";
        } else  {
            echo "Sorry , Query could no execute...";
        }
    }
?>




 <?php include 'headeradmin.php'; ?>
 

 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'menu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
 
     
     
     
  
    <div class="container-fluid mt--7">
     <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow" >
            <div class="card-header border-0">
              <h3 class="mb-0"><a href=""   class="btn btn-danger">APPROVE CUSTOMER ACCOUNT</a></h3>
            </div>
          
           <div class="card-body">
               
               
               <?php if(isset($msg)) echo $msg;  ?>
					<?php if(isset($msg1)) echo $msg1;  ?> 
					
                    <form role="form" class="form-validation-1" method="POST" enctype="multipart/form-data">
                        
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label>first Name</label>
                                <input type="text" name="fname" class="input-sm validate[required] form-control" value="<?php echo $row['fname']; ?>">
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Middle Name (Optional)</label>
                                <input type="text" name="mname" class="input-sm form-control" value="<?php echo $row['mname']; ?>">
                            </div>
							<div class="col-md-3 form-group">
                                <label>Last Name</label>
                                <input type="text" name="lname" class="input-sm validate[required] form-control" value="<?php echo $row['lname']; ?>">
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Username</label>
                                <input type="text" name="uname" class="input-sm validate[required] form-control" value="<?php echo $row['uname']; ?>">
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-4 form-group">
                                <label>Password</label>
                                <input type="text" name="upass" class="input-sm validate[required] form-control" value="<?php echo $row['upass']; ?>">
                            </div>
                            
							<div class="col-md-4 form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="input-sm validate[required] form-control" value="<?php echo $row['phone']; ?>">
                            </div>
							<div class="col-md-4 form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="input-sm validate[required] form-control" value="<?php echo $row['email']; ?>">
                            </div>
                            
                        </div>
						<div class="row">
                            <div class="col-md-3 form-group">
                                <label>Occupation</label>
                                <input type="text" name="work" class="input-sm validate[required] form-control" value="<?php echo $row['work']; ?>">
                            </div>
                            <div class="col-md-2 form-group" id="date-time">
							
                            <label>Date of Birth</label>
                            <div class="input-icon datetime-pick date-only">
                                <input data-format="dd/MM/yyyy" name="dob" type="text" value="<?php echo $row['dob']; ?>" class="form-control input-sm" />
                                <span class="add-on">
                                    <i class="sa-plus"></i>
                                </span>
                            </div>
							</div>
							
							<div class="col-md-2 form-group">
                                <label>Marital Status</label>
                                <select name="marry" class="form-control input-sm validate[required]">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Divorced">Divorced</option>
                                </select>
                            </div>
							<div class="col-md-2 form-group">
                                <label>Gender</label>
                                <select  name="sex" class="form-control input-sm validate[required]">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
							<div class="form-group col-md-3">
								<label>Address</label>
								<textarea name="addr" class="input-sm validate[required] form-control" value="<?php echo $row['addr']; ?>" placeholder="<?php echo $row['addr']; ?>"></textarea>
							</div>
                        </div>
						<div class="row">
                            <div class="col-md-3 form-group">
                                <label>Account Type</label>
                                <select name="type" class="form-control input-sm validate[required]">
                                    <option value="Savings">Savings</option>
                                    <option value="Current">Current</option>
                                 </select>
                            </div>
							<div class="col-md-3 form-group" id="date-time">
							
                            <label>Registration Date</label>
                            <div class="input-icon datetime-pick date-only">
                                <input data-format="dd/MM/yyyy" type="text" value="<?php echo $row['reg_date']; ?>" class="form-control input-sm" />
                                <span class="add-on">
                                    <i class="sa-plus"></i>
                                </span>
                            </div>
							</div>
                            <div class="col-md-3 form-group">
                                <label>Total Balance</label>
                                <input type="number" name="t_bal" class="input-sm validate[required] form-control" value="<?php echo $row['t_bal']; ?>">
                            </div>
							<div class="col-md-3 form-group">
                                <label>Available Balance</label>
                                <input type="number" name="a_bal" class="input-sm validate[required] form-control" value="<?php echo $row['a_bal']; ?>">
                            </div>
						</div>
						<div class="row">
						<div class="col-md-3 form-group">
							<label>Account Number</label>
							 <input type="number" name="acc_no" class="input-sm validate[required] form-control" value="<?php echo $row['acc_no']; ?>">
                        </div>
						<div class="col-md-2 form-group">
							<label>COT</label>
							 <input type="text" name="cot" class="input-sm validate[required] form-control" value="<?php echo $row['cot']; ?>">
                        </div>
						<div class="col-md-2 form-group">
							<label>IMF</label>
							 <input type="text" name="tax" class="input-sm validate[required] form-control" value="<?php echo $row['tax']; ?>">
                        </div>
					
						
							 <input type="text" name="imf" class="input-sm validate[required] form-control" value="<?php echo $row['imf']; ?>"hidden>
                       
						<div class="col-md-3 form-group">
							<label>Currency</label>
							 <input type="text" name="currency" class="input-sm validate[required] form-control" value="<?php echo $row['currency']; ?>">
                        </div>
						
						
							<div class="col-md-2 form-group">
							<label>pin auth</label>
							 <input type="text" name="pin_auth" class="input-sm validate[required] form-control" value="<?php echo $row['pin_auth']; ?>">
                        </div>
						
							
							 <input type="text" name="pin" class="input-sm validate[required] form-control" value="<?php echo $row['pin']; ?>" hidden>
                        
						<div class="col-md-2 form-group">
						
							 <input type="text" name="status" class="input-sm validate[required] form-control" value="Active" hidden>
</div>
						
							 <input type="text" name="verify" class="input-sm validate[required] form-control" value="Y" Hidden>
							 
                        	
					
						</div>
                            
                        </div>
                        
                        
                       
                        <input class="btn btn-info " type="submit" name="update" value="Update Account">
                        
                    </form>
              
               
               
               
               
               
               
               
          </div>
        </div>
      </div>
     </div>
 
    
       <?php include 'foot.php'; ?>