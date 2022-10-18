<?php
session_start();
require_once 'class.admin.php';
include_once ('session.php');
if (!isset($_SESSION['email'])) {

    header("Location: login.php");

    exit();
}
$reg_user = new USER();

if (isset($_POST['create'])) {


    $fname = trim($_POST['fname']);
    $fname = strip_tags($fname);
    $fname = htmlspecialchars($fname);

    $mname = trim($_POST['mname']);
    $mname = strip_tags($mname);
    $mname = htmlspecialchars($mname);

    $lname = trim($_POST['lname']);
    $lname = strip_tags($lname);
    $lname = htmlspecialchars($lname);

    $uname = trim($_POST['uname']);
    $uname = strip_tags($uname);
    $uname = htmlspecialchars($uname);

    $upass = $_POST['upass'];

    $phone = trim($_POST['phone']);
    $phone = strip_tags($phone);
    $phone = htmlspecialchars($phone);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $type = trim($_POST['type']);
    $type = strip_tags($type);
    $type = htmlspecialchars($type);

    $reg_date = trim($_POST['reg_date']);

    $work = trim($_POST['work']);
    $work = strip_tags($work);
    $work = htmlspecialchars($work);

    $acc_no = trim($_POST['acc_no']);
    $acc_no = strip_tags($acc_no);
    $acc_no = htmlspecialchars($acc_no);

    $addr = trim($_POST['addr']);
    $addr = strip_tags($addr);
    $addr = htmlspecialchars($addr);

    $sex = trim($_POST['sex']);
    $sex = strip_tags($sex);
    $sex = htmlspecialchars($sex);

    $dob = trim($_POST['dob']);
    $dob = strip_tags($dob);
    $dob = htmlspecialchars($dob);

    $marry = trim($_POST['marry']);
    $marry = strip_tags($marry);
    $marry = htmlspecialchars($marry);

    $t_bal = trim($_POST['t_bal']);
    $t_bal = strip_tags($t_bal);
    $t_bal = htmlspecialchars($t_bal);

    $a_bal = trim($_POST['a_bal']);
    $a_bal = strip_tags($a_bal);
    $a_bal = htmlspecialchars($a_bal);

    $currency = trim($_POST['currency']);
    $currency = strip_tags($currency);
    $currency = htmlspecialchars($currency);

    $cot = trim($_POST['cot']);
    $cot = strip_tags($cot);
    $cot = htmlspecialchars($cot);

    $tax = trim($_POST['tax']);
    $tax = strip_tags($tax);
    $tax = htmlspecialchars($tax);

    $imf = trim($_POST['imf']);
    $imf = strip_tags($imf);
    $imf = htmlspecialchars($imf);
    
    $pin_auth = trim($_POST['pin_auth']);
    $pin_auth = strip_tags($pin_auth);
    $pin_auth = htmlspecialchars($pin_auth);

    $pin = trim($_POST['pin']);
    $pin = strip_tags($pin);
    $pin = htmlspecialchars($pin);
    
    $verify = trim($_POST['verify']);
    $verify = strip_tags($verify);
    $verify = htmlspecialchars($verify);



    $stmt = $reg_user->runQuery("SELECT * FROM account WHERE email=:email");
    $stmt1 = $reg_user->runQuery("SELECT * FROM account WHERE uname=:uname");
    $stmt2 = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
    $stmt->execute(array(":email" => $email));
    $stmt1->execute(array(":uname" => $uname));
     $stmt2->execute(array(":acc_no" => $acc_no));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
     $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0 || $stmt1->rowCount() > 0 || $stmt2->rowCount() > 0) {
        $msg = "
		      <div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry!</strong>  Account Num, Email or Username already exists! Please, try another one!
			  </div>
			  ";
    } else {
        if ($reg_user->create($fname, $mname, $lname, $uname, $upass, $phone, $email, $type, $reg_date, $work, $acc_no, $addr, $sex, $dob, $marry, $t_bal, $a_bal, $currency, $cot, $tax, $imf, $pin_auth, $pin, $verify)) {
            $id = $reg_user->lasdID();




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
                                 <img src='https://digitalforestservers.com.ng/bankforce/assets/img/brand/blue.png' alt='' data-default='placeholder' data-max-width='100' width='118' height='80' >
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
        <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
        	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                        <tr><td height='25'  ></td></tr>

                        <tr>
                          <td height='290'  bgcolor='#AA2E33'>
                            <table align='center' width='600' border='0' cellspacing='0' cellpadding='0' class='MainContainer'>
  <tr>
    <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
      <tr>
        <td width='250' valign='top' class='specbundle4'>
          <table width='250' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
            <tr><td colspan='3' height='10'></td></tr>
            
            <tr>
              <td width='10'></td>
              <td width='230' valign='top'>
                <table width='230' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                  <tr>
                    <td valign='top'>
                      <div class='contentEditableContainer contentTextEditable'>
                        <div class='contentEditable' >
                          <h1 style='font-size:20px;font-weight:normal;color:#ffffff;line-height:19px;'>Congratulations, $fname</h1>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <tr><td height='18'></td></tr>
                  <tr>
                    <td valign='top'>
                      <div class='contentEditableContainer contentTextEditable'>
                        <div class='contentEditable' >
                          <p style='font-size:13px;color:#cfeafa;line-height:19px;'>Your account was successfully opened!<br>Please see the details of your account below.</p>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <tr><td height='33'></td></tr>
                  <tr>
                    <td>
                      <div class='contentEditableContainer contentTextEditable'>
                        <div class='contentEditable' >
                          
                          </div>
                        </div>
                      </td>
                    </tr>
                  <tr><td height='15'></td></tr>
                  </table>
                </td>
              <td width='10'></td>
              </tr>
            </table>
          </td>
        </tr>
  </table>
  </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

                          </td>
                        </tr>

                        <tr><td height='25' ></td></tr>
          </table>
        </div>
        
        
        
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
                                      <h3>Account Details</h3>
                                     <table style='border:1px solid black;padding:2px;' width='400'>
										
										<tr>
											<th style='text-align:left;'>Account Number</th>
											<td>$acc_no</td>
										</tr>
										
<tr>
											<th style='text-align:left;'>Account Password</th>
											<td>$upass</td>
										</tr>
                                        <tr>
											<th style='text-align:left;'>Account Login Pin</th>
											<td>$pin_auth</td>
										</tr>										<tr>
											<th style='text-align:left;'>Balance</th>
											<td>$currency $t_bal</td>
										</tr>
										<tr>
											<th style='text-align:left;'>Pending Debit</th>
											<td>$currency 0.00</td>
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
                                      <p style=' font-weight:bold;font-size:13px;line-height: 30px;'>MARGON BANKING SCRIPT.</p>
                                    </div>
                                  </div>
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


            $subject = "Welcome $fname - Your Account Has Been Created!";




            $send_otp_mobile = preg_replace('/[^0-9]/', '', $_POST['phone']);
            $reg_user->send_mail($email, $messag, $subject);
            //$reg_user->otp($send_otp_mobile, $subject);





            $msg1 = "
					<div class='alert alert-info'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong> Account Has Been Successfully Created!
                   
			  		</div>
					";
        } else {
            echo "Sorry , Query could no execute...";
        }
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
              <h3 class="mb-0"><a href=""   class="btn btn-danger">REGISTER NEW USER HERE</a></h3>
            </div>
           
             
           <form role="form" style="width:98%; padding-left:15px; "  method="POST" enctype="multipart/form-data">
                    <?php if (isset($msg1)) echo $msg1; ?>
                      <?php if (isset($msg)) echo $msg; ?>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" class="input-sm validate[required] form-control" placeholder="First Name">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Middle Name (Optional)</label>
                            <input type="text" name="mname" class="input-sm form-control" placeholder="Middle Name">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="input-sm validate[required] form-control" placeholder="Last Name">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="input-sm validate[required] form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Password</label>
                            <input type="text" name="upass" class="input-sm validate[required] form-control" placeholder="Password">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Occupation</label>
                            <input type="text" name="work" class="input-sm validate[required] form-control" placeholder="Occupation">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Phone(Type without +)</label>
                            <input type="text" name="phone" class="input-sm validate[required] form-control" placeholder="Eg 2341234567786">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="input-sm validate[required] form-control" placeholder="Email">
                        </div>

                    </div>
                    <div class="row">
                        
                        <div class="col-md-2 form-group" id="date-time">

                            <label>Date of Birth</label>
                            <div class="input-icon datetime-pick date-only">
                                <input data-format="dd/MM/yyyy" name="dob" type="text" placeholder="Select Date of Birth" class="form-control input-sm" />
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
                            <textarea name="addr" class="input-sm validate[required] form-control" placeholder="House or Office Address"></textarea>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Account Type</label>
                            <select name="type" class="form-control input-sm validate[required]">
                                <option value="Savings">Savings</option>
                                <option value="Current">Current</option>
                                 <option value="Checking">Checking</option>
                                <option value="Fixed Deposit">Fixed Deposit</option>
                                 <option value="NON-Resident">NON-Resident</option>
                                <option value="Online Banking">Online Banking</option>
                                 <option value="Joint Account">Joint Account</option>
                                <option value="DOMICILIARY ACCOUNT">DOMICILIARY ACCOUNT</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-3 form-group" id="date-time">

                            <label>Registration Date</label>
                            <div class="input-icon datetime-pick date-only">
                                <input data-format="dd/MM/yyyy" name="reg_date" type="text" placeholder="Select Reg Date" class="form-control input-sm" />
                                <span class="add-on">
                                    <i class="sa-plus"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Total Balance</label>
                            <input type="number" name="t_bal" class="input-sm validate[required] form-control" placeholder="Total Balance">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Available Balance</label>
                            <input type="number" name="a_bal" class="input-sm validate[required] form-control" placeholder="Available Balance">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Select Account No</label>
                            <input type="text" name="acc_no" class="input-sm validate[required] form-control" placeholder="Assign Account Number">
                        </div>
                        
                    </div>
                     
                    <div class="row">
                       
<div class="col-md-3 form-group">
                            <label>Account Currency</label>
                            <select class="input-sm validate[required] form-control" name="currency">
                                <option value="USD $">Dollar</option>
                                <option value="GBP £">Pound</option>
                                <option value="EUR €">Euro</option>

                            </select>
                        </div>
                        

                        <div class="col-md-2 form-group">
                            <label>COT Code</label>
                            <input type="text" name="cot" class="input-sm validate[required] form-control" placeholder="Assign COT Code">
                        </div>

                        <div class="col-md-2 form-group">
                            <label>IMF Code</label>
                            <input type="text" name="tax" class="input-sm validate[required] form-control" placeholder="Assign IMF Code">
                        </div>

                        <div class="col-md-2 form-group">
                            <label>COMPLAINT Code</label>
                            <input type="text" name="imf" class="input-sm validate[required] form-control" placeholder="Assign COMPLAINT Code">
                        </div>
                        
                        <div class="col-md-2 form-group">
                            <label>LOGIN PIN/ATM PIN</label>
                            <input type="text" name="pin_auth" class="input-sm validate[required] form-control" placeholder="Assign Auth PIN Code">
                        </div>

                        
                        
                         <div class="col-md-2 form-group">
                            <label></label>
                            
                        </div>
                    </div>
                    <div class="col-md-2 form-group">
                            <label>DOMESTIC TRANSFER PIN</label>
                            <input type="text" name="pin" class="input-sm validate[required] form-control" placeholder="Assign PIN Code">
                        </div>
                         <div class="col-md-2 form-group">
                           
                            <input type="text" name="verify" class="input-sm validate[required] form-control" value="Y" hidden>
                        </div>
            
             
            <input class="btn btn-md btn-info " type="reset" value="Reset">
            <input class="btn btn-info btn-md" type="submit" name="create" value="Create Account">
            
            
            </div>


  
            

            </form>
             
 
        
          </div>
        </div>
      </div>
     
       <?php include 'foot.php'; ?>