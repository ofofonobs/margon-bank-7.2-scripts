<?php 
include_once 'class.crud.php';
if(isset($_POST['btn-updatet']))
{
	$id = $_GET['edit_id'];
	$email = $_POST['email'];
	$bank_name = $_POST['bank_name'];
	$acc_name = $_POST['acc_name'];
	$acc_no = $_POST['acc_no'];
	$amount = $_POST['amount'];
	$date = $_POST['date'];
	$status = $_POST['status'];
	$swift = $_POST['swift'];
	$type = $_POST['type'];
	$remarks = $_POST['remarks'];
	
	
		$statement = $DB_con->prepare("SELECT  A.email, A.t_bal, B.currency from A FULL JOIN B ON A.email = B.email");
		
		$row = $statement->fetch(PDO::FETCH_ASSOC);

	if($crud->updatet($id,$email,$bank_name,$acc_name,$acc_no,$amount,$date,$status,$swift,$type,$remarks))
	

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
                                      <h3>Dear Customer $fname</h3><br>
     <P style='font-size:15px;font-weight:normal;color:BLACK;'>Below is your Transfer Transaction Details<br>
         <br>
        </P>
</div>
									 <div class='contentEditable' ><br>
                                      
                                    </div>
                                  </div>   <h3>Details</h3>                              <table style='border:1px solid black;padding:2px;' width='400'>
										
										<tr>
											<th style='text-align:left;'>Amount</th>
											<td>$amount</td>
										</tr>
										
<tr>
											<th style='text-align:left;'>Beneficiary Name</th>
											<td>$acc_name</td>
										</tr>
                                        										<tr>
											<th style='text-align:left;'>Beneficiary Account and Bank</th>
											<td>$acc_no , $bank_name</td>
										</tr>
										<tr>
											<th style='text-align:left;'>Date</th>
											<td>$date</td>
										</tr>
										<tr> 
											<th style='text-align:left;'>Transfer Status</th>
											<td>$status</td>
  </tr>                                           
    <th style='text-align:left;'>Description </th>
											<td>$remarks</td>

                                            <tr> 								</tr>
										
                                     </table>
                                    </div>
									 <div class='contentEditable' ><br>
                                      <p style='font-weight:bold;font-size:13px;line-height: 30px; color:#AA2E33;'></p>
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



            $subject = " $fname  Transfer Status!";




            $send_otp_mobile = preg_replace('/[^0-9]/', '', $_POST['phone']);
            $crud->send_mail($email, $messag, $subject);
            //$reg_user->otp($send_otp_mobile, $subject);

	
		$msg = "<div class='alert alert-info'>
				Transfer Record was updated successfully <a href='index.php'>HOME</a>!
				</div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				<strong>SORRY!</strong> ERROR while updating record !
				</div>";
	}

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getIDt($id));	
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
              <h3 class="mb-0"><a href=""   class="btn btn-danger">EDIT CUSTOMER TRANSEFR INFORMATION</a></h3>
            </div>
          
           <div class="card-body">
               
               <?php
if(isset($msg))
{
	echo $msg;
}
?>
               
               
                                              <div class="container-fluid">
	<form method='post' class=''>
 
         <div class="row">
         <div class="form-group col-md-3">
            <label for="name">EMAIL</label>
			<input id="name" name="email" class="form-control" type="text" value="<?php echo $email;?>"  />
        </div>
		
        <div class="form-group col-md-3">
            <label for="name">BENEFICIARY BANK NAME</label>
			<input id="name" name="bank_name" class="form-control" type="text" value="<?php echo $bank_name;?>"  />
        </div>
  
        <div class="form-group col-md-3">
			<label for="acc_no">BENEFICIARY ACCOUNT NAME</label>
			<input id="acc_name" name="acc_name" class="form-control" type="text" value="<?php echo $acc_name;?>" />
        </div>
 
   </div>
 
  <div class="row">
        <div class="form-group col-md-3">
            <label for="website">BENEFICIARY ACCOUNT NO.</label>
			<input id="website" name="acc_no" class="form-control" type="text" value="<?php echo $acc_no;?>" />
        </div>
 
        <div class="form-group col-md-3">
			<label for="contact">AMOUNT </label>
			<input id="contact" name="amount" class="form-control" type="text" value="<?php echo $amount;?>" required />
        </div>
		
		<div class="form-group col-md-3">
			<label for="job">DATE</label>  <small>Input like this (YYYY-MM-DD HH:MM:SS)</small>
			<input id="job" name="date" class="form-control" type="text" value="<?php echo $date;?>" required />
        </div>
	</div>
	
	 <div class="row">
		<div class="form-group col-md-3">
		    <label>Transfer Status</label><small> <b>Current= <?php echo $status;?></b></small>
                            <select name="status" class="form-control input-sm validate[required]">
                                <option value="Pending">Pending</option>
                                <option value="Successful">Successful</option>
                                <option value="Failed">Failed</option>
                                <option value="Cancelled">Cancelled</option>
                                 <option value="On-hold">On-hold</option>
                            </select>
			
        </div>
		
		
         <div class="form-group col-md-3">
            <label for="name">SWIFT</label>
			<input id="name" name="swift" class="form-control" type="text" value="<?php echo $swift;?>"  />
        </div>
		
        <div class="form-group col-md-3">
            <label for="name">ACC. TYPE</label>
		  <select name="type" class="form-control input-sm validate[required]">
                                    <option value="Savings">Savings</option>
                                    <option value="Current">Current</option>
                                 </select>
        </div>
 </div>
        <div class="form-group col-md-3">
			<label for="acc_no">TRANSFER DESC.</label>
			<input id="acc_name" name="remarks" class="form-control" type="text" value="<?php echo $remarks;?>" />
        </div>
 
      
		<div class="clearfix"></div>
            <br />
        <table>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-updatet">
    			<span class="glyphicon glyphicon-edit"></span>  UPDATE TRANSFER
				</button>
                <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
            </td>
        </tr>
        </table>
</form> 
</div>

               
               
               
               
               
               
               
               
          </div>
        </div>
      </div>
     </div>
 
    
       <?php include 'foot.php'; ?>