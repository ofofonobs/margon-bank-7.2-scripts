<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';

if (!isset($_SESSION['acc_no'])) {

    header("Location: login.php");
    exit();
}




$reg_user = new USER();
$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no" => $_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$email = $row['email'];

$temp = $reg_user->runQuery("SELECT * FROM temp_transfer WHERE email = '$email' ORDER BY id DESC LIMIT 1");
$temp->execute();
$rows = $temp->fetch(PDO::FETCH_ASSOC);
$tempa = $reg_user->runQuery("SELECT * FROM transfer WHERE email = '$email' ORDER BY id DESC LIMIT 1");
$tempa->execute();
$rowc = $tempa->fetch(PDO::FETCH_ASSOC);

$ego = $reg_user->runQuery("SELECT t_bal FROM account WHERE acc_no=:acc_no");
$stmt1 = $reg_user->runQuery("SELECT a_bal FROM account WHERE acc_no=:acc_no");
$ego->execute(array(":acc_no" => $_SESSION['acc_no']));
$stmt1->execute(array(":acc_no" => $_SESSION['acc_no']));
$owo = $ego->fetch(PDO::FETCH_ASSOC);
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

$bal = $row['t_bal'];
$baa = $row['a_bal'];
$amount = $rows['amount'];

if (isset($_POST['code'])) {
    $email = $row['email'];
    $amount = $_POST['amount'];
    $acc_no = $_POST['acc_no'];
    $acc_name = $_POST['acc_name'];
    $bank_name = $_POST['bank_name'];
    $swift = $_POST['swift'];
    $routing = $_POST['routing'];
    $type = $_POST['type'];
    $remarks = $_POST['remarks'];
    $bal = $row['t_bal'];
    $baa = $row['a_bal'];
$cout = $_POST['cout'];
$transtype = $_POST['transtype'];


    $tmp_otp = $row['tmp_otp'];
    $sub = $_POST['tmp_otp'];


    if ($sub !== $tmp_otp) {
        header("Location: dom.php?errorotp");
        exit();
    } elseif ($bal < $amount && $baa < $amount) {
        $bal = $row['t_bal'];
        $baa = $row['a_bal'];
        $amount = $rows['amount'];
        header("Location: dom.php?insufficient");
        exit();
    } else {
        if ($reg_user->transfer($email, $amount, $acc_no, $acc_name, $bank_name, $swift, $routing, $type, $remarks, $cout, $transtype)) {
            $email = $row['email'];
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $currency = $row['currency'];
            $amount = $rows['amount'];
            $acc_no = $row['acc_no'];
            $phone = $row['phone'];
            $acc_name = $_POST['acc_name'];
            $bank_name = $_POST['bank_name'];
            $swift = $_POST['swift'];
            $routing = $_POST['routing'];
            $type = $_POST['type'];
            $date = $rowc['date'];
            $remarks = $_POST['remarks'];
            $cout = $_POST['cout'];
            $transtype = $_POST['transtype'];


            $bal = $row['t_bal'];
            $baa = $row['a_bal'];
            $total = $bal - $amount;
            $avail = $baa - $amount;

            $updatebal = $reg_user->runQuery("UPDATE account SET t_bal = '$total', a_bal = '$avail' WHERE email = '$email'");
            $updatebal->execute();




            $messag = "	
				
			
			
			
			}
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
                      <td valign='top'  colspan='3'>
                        <table width='600' border='0' bgcolor='WHITE' cellspacing='0' cellpadding='0' align='center' valign='top' class='MainContainer'>
                          <tr>
                            <td align='left' valign='middle' width='200'>
                              <div class='contentEditableContainer contentImageEditable'>
                                <div class='contentEditable' >
                                   <center> <img src='https://digitalforestservers.com.ng/bankforce/assets/img/brand/blue.png' alt='' data-default='placeholder' data-max-width='120' width='118' height='50' > </center>
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
	<br > 
     <h1 style='font-size:20px;font-weight:normal;color:#0076b6;line-height:19px;'>Dear $fname $lname,</h1><p style='font-size:17px;color:#0076b6;line-height:19px;'>Your transfer was successful! Below is the transaction summary.</p>								<h3>Transaction Alert</h3>
                                     <table style='border:1px solid black;padding:2px;' width='400'>
										<tr>
											<th style='text-align:left;'>Credit/Debit</th>
											<td>Debit</td>
										</tr>
										<tr>
											<th style='text-align:left;'>Account Number</th>
											<td>$acc_no</td>
										</tr>
										<tr>
											<th style='text-align:left;'>Date/Time</th>
											<td>$date</td>
										</tr>
										<tr>
											<th style='text-align:left;'>Description</th>
											<td>Transfer: $remarks</td>
										</tr>
										<tr>
											<th style='text-align:left;'>Amount</th>
											<td>$currency $amount</td>
										</tr>
										<tr>
											<th style='text-align:left;'>Balance</th>
											<td>$currency $bal</td>
										</tr>
										
										<tr style='background-color:#0076b6;'>
											<th style='text-align:left; color:#fff;'>Available Balance</th>
											<td style='color:#fff;'>$currency $avail</td>
										</tr>
                                     </table>
                                    </div>
                                  </div>
                                </td>
                              </tr>

                              <tr><td height='28'>&nbsp;</td></tr>
                              
                              <tr>
                                <td valign='top' align='center'>
                                  <div class='contentEditableContainer contentTextEditable'>
                                    <div class='contentEditable' >
                                       <p style=' font-weight:bold;font-size:13px;line-height: 30px;'>MARGON BANKING SCRIPT</p>
                                    </div>
    <br>                           <div class='contentEditableContainer contentTextEditable'>
                                    <div class='contentEditable' >
                                      <p style='#F00; font-size:13px;line-height: 15px;'>This message is sent to this email to $fname <br /> <br /> <center><b>How do I know this is not a fake email?</b></center> <br />

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


            $subject = "[Debit Alert] - My Online Banking.";

            $reg_user->send_mail($email, $messag, $subject);

            $phonee = preg_replace('/[^0-9]/', '', $row['phone']);

            $acc_last_four = substr($row['acc_no'], -4);
            $amoun_sms = $currency . " " . $amount;
            $balance_sms = $currency . " " . $bal;
            $remark_sms = substr($remarks, 0, 15);

            $mobile_msg = "Transfer completed, Acct: **".$acc_last_four.",  Amt: " .$amoun_sms. ", Desc:".$remark_sms. ", Date:".$date.", Avail Bal:".$balance_sms;
            //$reg_user->otp($phonee, $mobile_msg);

            header("Location: fundsuccess.php");
            exit();
        }
    }
}
include_once ('counter.php');
?>



 <?php include 'header.php'; ?>
 
 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'mobmenu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
   <!---begin of Main Menu View View Here   only from Digital Forest Team-->
   <?php include 'mainmenu.php'; ?>

     <!---End of Main Menu View Here   only from Digital Forest Team-->
     
     
     
  
    <div class="container-fluid mt--7">
      
      
      
      
      
      
      
     <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="admin/pic/<?php echo $row['image']; ?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4"><?php echo $row['status']; ?></a>
                <a href="#" class="btn btn-sm btn-default float-right"><?php echo $row['type']; ?></a>
              </div>
            </div>
             
            <div class="card-body pt-0 pt-md-4">
               <div class="row">
                <div class="col">
                  &nbsp;
                </div>
              </div>
              <div class="text-center">
                <h3>
                  <?php echo $row['fname']; ?> <?php echo $row['lname']; ?> <span class="font-weight-light">, Date of Birth:  <?php echo $row['dob']; ?></span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $row['addr']; ?>	
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">One Time Password/Passcode</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#" class="btn btn-sm btn-primary">OTP SMS/EMAIL</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              
              
              
              <form autocomplete="off" method="post" >
          
                             
                <h6 class="heading-small text-muted mb-4">Hello, <?php echo $row['fname']; ?>, kindly validate the 6 Digit OTP sent to your <?php echo $row['phone']; ?> or <?php echo $row['email']; ?></h6>
                <div class="pl-lg-4">
                  
                  
                   <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                          
                          
                        <label class="form-control-label" for="input-first-name">Enter OTP Code</label>
                        <textarea class="form-control" placeholder="Your One Time Password Code  is required..." name="tmp_otp" type="text" required></textarea>
                        
                          
                                    
                                            <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                            <input type="hidden" name="amount" value="<?php echo $rows['amount']; ?>">
                                            <input type="hidden" name="acc_no" value="<?php echo $rows['acc_no']; ?>">
                                            <input type="hidden" name="acc_name" value="<?php echo $rows['acc_name']; ?>">
                                            <input type="hidden" name="bank_name" value="<?php echo $rows['bank_name']; ?>">
                                            <input type="hidden" name="swift" value="<?php echo $rows['swift']; ?>">
                                             <input type="hidden" name="cout" value="<?php echo $rows['cout']; ?>">
                                             
                                             <input type="hidden" name="transtype" value="<?php echo $rows['transtype']; ?>">
                                            <input type="hidden" name="routing" value="<?php echo $rows['routing']; ?>">
                                            <input type="hidden" name="type" value="<?php echo $rows['type']; ?>">
                                            <input type="hidden" name="remarks" value="<?php echo $rows['remarks']; ?>">

                      </div>
                    </div>
                   
                  </div>
                  
                    
                </div>
               
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                         <button class="btn btn-danger" type="submit" name="code" > Validate OTP>></button>
                      </div>
                    </div>
                  </div>
                 
                </div>
                
              </form>
              
              
              
              
              
            </div>
          </div>
        </div>
      </div>
      
      
      
       
      
      
     
      <!-- Footer -->
       <?php include 'footercopyright.php'; ?>
      
     