<?php
session_start();
require_once ('class.admin.php');
include_once ('session.php');

$reg_user = new USER();

if (!isset($_SESSION['email'])) {

    header("Location: login.php");

    exit();
}

$stmt = $reg_user->runQuery("SELECT * FROM account");
$stmt->execute();

$credit = $reg_user->runQuery("SELECT * FROM account");
$credit->execute();

$debit = $reg_user->runQuery("SELECT * FROM account");
$debit->execute();

$mail = $_SESSION['email'];

$ad = $reg_user->runQuery("SELECT * FROM admin WHERE email = '$mail'");
$ad->execute();
$rom = $ad->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['edit'])) {
    $pass = $_POST['upass1'];
    $cpass = $_POST['upass'];
    $email = $_POST['email'];

    if ($cpass !== $pass) {
        $msg = "<div class='alert alert-danger'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Sorry!</strong>  Passwords Doesn't match. 
						</div>";
    } else {
        $password = md5($cpass);
        $ed = $reg_user->runQuery("UPDATE admin SET email = '$email', upass = :upass WHERE email=:email");
        $ed->execute(array(":upass" => $password, ":email" => $_SESSION['email']));

        $msg = "<div class='alert alert-info'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Login Details Was Successfully Changed!</strong>
						</div>";
    }
}

if (isset($_POST['his'])) {
    $uname = trim($_POST['uname']);
    $uname = strip_tags($uname);
    $uname = htmlspecialchars($uname);

    $amount = trim($_POST['amount']);
    $amount = strip_tags($amount);
    $amount = htmlspecialchars($amount);

    $sender_name = trim($_POST['sender_name']);
    $sender_name = strip_tags($sender_name);
    $sender_name = htmlspecialchars($sender_name);

    $type = trim($_POST['type']);
    $type = strip_tags($type);
    $type = htmlspecialchars($type);

    $remarks = trim($_POST['remarks']);
    $remarks = strip_tags($remarks);
    $remarks = htmlspecialchars($remarks);

    $date = trim($_POST['date']);
    $date = strip_tags($date);
    $date = htmlspecialchars($date);

    $time = trim($_POST['time']);
    $time = strip_tags($time);
    $time = htmlspecialchars($time);

    $alerts = $reg_user->runQuery("SELECT * FROM alerts");
    $alerts->execute();

    if ($reg_user->his($uname, $amount, $sender_name, $type, $remarks, $date, $time)) {
        $id = $reg_user->lasdID();


        $msg = "<div class='alert alert-info'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>History Successfully Added!</strong> 
			  </div>";
    } else {
        $msg = "Error!";
    }
}

if (isset($_POST['credit'])) {
    $uname = trim($_POST['uname']);
    $uname = strip_tags($uname);
    $uname = htmlspecialchars($uname);

    $amount = trim($_POST['amount']);
    $amount = strip_tags($amount);
    $amount = htmlspecialchars($amount);

    $sender_name = trim($_POST['sender_name']);
    $sender_name = strip_tags($sender_name);
    $sender_name = htmlspecialchars($sender_name);

    $type = trim($_POST['type']);
    $type = strip_tags($type);
    $type = htmlspecialchars($type);

    $remarks = trim($_POST['remarks']);
    $remarks = strip_tags($remarks);
    $remarks = htmlspecialchars($remarks);
    
     $statz = trim($_POST['statz']);
    $statz = strip_tags($statz);
    $statz = htmlspecialchars($statz);

    $date = trim($_POST['date']);
    $date = strip_tags($date);
    $date = htmlspecialchars($date);

    $time = trim($_POST['time']);
    $time = strip_tags($time);
    $time = htmlspecialchars($time);



    if ($reg_user->his($uname, $amount, $sender_name, $type, $remarks, $date, $time, $statz)) {
        $read = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$uname'");
        $read->execute();
        $show = $read->fetch(PDO::FETCH_ASSOC);

        $currency = $show['currency'];
        $acc = $show['acc_no'];
        $fname = $show['fname'];
        $mname = $show['mname'];
        $lname = $show['lname'];
        $email = $show['email'];
        $phone = $show['phone'];
        $tbal = $show['t_bal'];
        $abal = $show['a_bal'];
        $diff = $amount + $tbal;
        $dif = $amount + $abal;

        $credited = $reg_user->runQuery("UPDATE account SET t_bal = '$diff', a_bal = '$dif' WHERE acc_no = '$uname'");
        $credited->execute();

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
                   <tr><td height='25'  colspan='3'></td></tr>

                    <tr>
                      <td valign='top'  colspan='3'>
                        <table width='600' border='0' bgcolor='transparent' cellspacing='0' cellpadding='0' align='center' valign='top' class='MainContainer'>
                          <tr>
                            <td align='left' valign='middle' width='200'>
                              <div class='contentEditableContainer contentImageEditable'>
                                <div class='contentEditable' >
                                  <center><img src='https://buyscriptsdemo.work/margonbank/assets/img/brand/blue.png' alt='' data-default='placeholder' data-max-width='100' width='150' height='80' ></center>
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
                                <td valign='top' align='center'>
                                  <div class='contentEditableContainer contentTextEditable'>
                                    <div class='contentEditable' >
       <br >                             <h1 style='font-size:20px;font-weight:normal;color:#0076b6;line-height:19px;'>Dear $fname $lname,</h1> <br >
 <p style='font-size:15px;color:#0076b6;line-height:19px;'>This is a summary of a transaction that has occurred on your account below</p>									<h3>Transaction Alert</h3>
                                     <table style='border:1px solid black;padding:2px;' width='400'>
										<tr>
											<th style='text-align:left;'>Credit/Debit</th>
											<td>$type</td>
										</tr>
										<tr>
											<th style='text-align:left;'>Account Number</th>
											<td>$acc</td>
										</tr>
										<tr>
											<th style='text-align:left;'>Date/Time</th>
											<td>$date $time</td>
										</tr>
										<tr>
											<th style='text-align:left;'>Description</th>
											<td>$remarks</td>
										</tr>
										<tr>
											<th style='text-align:left;'>Amount</th>
											<td>$currency $amount</td>
										</tr>

										<tr style='background-color:#0076b6;'>
											<th style='text-align:left; color:#fff;'>Available Balance</th>
											<td style='color:#fff;'>$currency $diff</td>
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
                                      <p style=' font-weight:bold;font-size:13px;line-height: 30px;'>Margon Banking Script.</p>
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


        $subject = '[Credit Alert] - BarclaysOnline';

        $reg_user->send_mail($email, $messag, $subject);
        $phone_sms = preg_replace('/[^0-9]/', '', $phone);
       $last_digit = substr($acc, -4);
        $amountt = $currency ."".$amount;
        $avl_bal = $currency ."".$diff;
        $rem = $remarks;
       
        $message_sms =" 
        Your Acct $last_digit Has Been Credited with $amountt.00 On $date $time By $rem .Available Bal:$avl_bal";
        $reg_user->otp($phone_sms, $message_sms);


        $msg = "<div class='alert alert-success'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>$uname Successfully Credited the Sum of $amount!</strong> 
			  </div>";
    } else {
        $msg = "Error!";
    }
}
 
mysqli_close($connection);
?>
 <?php include 'headeradmin.php'; ?>
 

 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'menu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
 
      <script type="text/javascript" src="paginator.js"></script>
        <script type="text/javascript" src="table.js"></script>
     
     
  
    <div class="container-fluid mt--7">
     <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow" >
            <div class="card-header border-0">
              <h3 class="mb-0"><a href=""   class="btn btn-danger">CREDIT CUSTOMER</a></h3>
            </div>
          
           <div class="card-body">
               
              <?php if (isset($msg)) echo $msg; ?>   
                 <?php if (isset($msg1)) echo $msg1; ?>   
               
<div class="container-fluid">
 


 <form method="POST">
                           
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Select Account To Credit</label>
                                        <select name="uname" class="form-control input-sm validate[required]">
<?php while ($rows = $credit->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <option value="<?php echo $rows['acc_no']; ?>"><?php echo $rows['fname']; ?> <?php echo $rows['mname']; ?> <?php echo $rows['lname']; ?></option>
<?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>From</label>
                                        <input type="text" name="sender_name"  class="input-sm form-control " required/>
                                    </div>
                                </div>
                                
                       
 
                                
                                <div class="row">
                                    <div class="col-md-6 form-group" >
                                        <label>Amount</label>
                                        <input type="number" name="amount" class="input-sm form-control [required] mask-money" placeholder="Eg, 3500" required/>
                                        <input type="hidden" name="type" value="Credit"/>
                                        
                                        <input type="hidden" name="statz" value="Successfull"/>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Description</label>
                                        <textarea  name="remarks" class="input-sm form-control " placeholder="Eg, Flight Payment" required ></textarea>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6 form-group">
                                        <label>Date dd/MM/yyy</label>
                                        <div class="input-icon ">
                                            <input data-format="dd/MM/yyyy" type="text" name="date" class="input-sm validate[required] form-control " placeholder="Eg, 21/12/2019" required />
                                            <span class="add-on">
                                                <i class="sa-plus"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>Time hh:mm:ss</label>
                                        <div class="input-icon ">
                                            <input data-format="hh:mm:ss" type="text" name="time" class="input-sm validate[required] form-control" placeholder="Eg, 14:32" required />
                                            <span class="add-on">
                                                <i class="sa-plus"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer" style="text-align:right;">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
                                        <button type="reset" class="btn btn-warning btn-lg">Reset</button>
                                        <button type="submit" name="credit" class="btn btn-success btn-lg">Credit Account</button>

                                    </div>
                                </div>
                          
                        </form>







</div>
               
               
               
          </div>
        </div>
      </div>
     </div>
 
    
       <?php include 'foot.php'; ?>



