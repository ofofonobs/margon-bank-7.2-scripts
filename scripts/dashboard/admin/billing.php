<?php
session_start();
require_once ('class.admin.php');
include_once ('session.php');

$reg_user = new USER();

if(!isset($_SESSION['email'])){
	
header("Location: login.php");

exit(); 
}

$stmt = $reg_user->runQuery("SELECT * FROM account");
$stmt->execute();

if(isset($_POST['set']))
{
	
	$uname = trim($_POST['uname']);
	$uname = strip_tags($uname);
	$uname = htmlspecialchars($uname);
	
	$billing_code = trim($_POST['billing_code']);
	$billing_code = strip_tags($billing_code);
	$billing_code = htmlspecialchars($billing_code);
	
			$set= $reg_user->runQuery("UPDATE account SET uname = '$uname', billing_code = '$billing_code' WHERE uname = '$uname'");
			$set->execute();
			
			$id = $reg_user->lasdID();		
			
			
			$msg= "<div class='alert alert-info'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Settings Saved Successfully to <b>$billing_code</b>!</strong> 
			  </div>";	

}

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
              <h3 class="mb-0"><a href=""   class="btn btn-danger">CHANGE USER BILLING CODE</a></h3>
            </div>
          
           <div class="card-body">
               
               <?php if(isset($msg)) echo $msg;  ?> 
              
            
              <form method="POST">
               
                 <div class="col-lg-6">
                      <div class="form-group">
				 
						<label>Select Client</label>
						<select name="uname" class="form-control input-sm validate[required]">
						<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>
							<option value="<?php echo $row['uname']; ?>"><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></option>
						<?php } ?>
					   </select>
				 
			 </div></div>
			
			  <div class="col-lg-6">
                      <div class="form-group">
						<label>Transfer Billing Status <span style="color:red;">ACTIVE means client will need COT and IMF during Transfer and Deactivate means No Billing Code</span></label>
						<select  name="billing_code" class="form-control input-sm validate[required]">
							<option value="1">ACTIVE</option>
							<option value="0">DEACTIVATE</option> 
						</select>
				 
                </div></div>
                <br/>
					<button type="submit" name="set" class="btn btn-info ">Set/Diable Billing Code</button>
				</form>
               
               <hr>
               	<article>
				<ul>
					<li><b>Active</b> <p> This means that the client can make transfer with COT code and IMF Code</p></li>
					<li><b>Deactivate Means the client can make transfer without billing code (OTP only)</p></li>
			 
    </ul>
				</article>
               
               
               
               
          </div>
        </div>
      </div>
     </div>
 
    
       <?php include 'foot.php'; ?>