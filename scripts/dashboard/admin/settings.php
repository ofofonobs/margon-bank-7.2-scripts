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
	
	$status = trim($_POST['status']);
	$status = strip_tags($status);
	$status = htmlspecialchars($status);
	
			$set= $reg_user->runQuery("UPDATE account SET uname = '$uname', status = '$status' WHERE uname = '$uname'");
			$set->execute();
			
			$id = $reg_user->lasdID();		
			
			
			$msg= "<div class='alert alert-info'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Account Successfully Set to <b>$status</b>!</strong> 
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
              <h3 class="mb-0"><a href=""   class="btn btn-danger">CHANGE USER ACCOUNT STATUS</a></h3>
            </div>
          
           <div class="card-body">
               
               <?php if(isset($msg)) echo $msg;  ?> 
              
            
              <form method="POST">
                <div class="row">
					<div class="col-md-3 form-group">
						<label>Select Account</label>
						<select name="uname" class="form-control input-sm validate[required]">
						<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>
							<option value="<?php echo $row['uname']; ?>"><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></option>
						<?php } ?>
					   </select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 form-group">
						<label>Set Status</label>
						<select  name="status" class="form-control input-sm validate[required]">
							<option value="ACTIVE">ACTIVE</option>
							<option value="DORMANT/INACTIVE">DORMANT/INACTIVE</option>
							<option value="CLOSED">DELETED</option>
							<option value="DISABLED">DISABLED</option>
							<option value="SUSPEND">SUSPEND</option>
							<option value="ON HOLD">ON HOLD</option>
						</select>
					</div>
                </div>
					<button type="submit" name="set" class="btn btn-info ">Set</button>
				</form>
               
               <hr>
               	<article>
				<ul>
					<li><b>Active</b> <p> This means that the client can access all functions within his/her account</p></li>
					<li><b>Dormant/Inactive</b><p>A notice that the account is Dormant/Inactive will be shown on the client's dashboard. Also, he/she will not be able to make any transfers.</p></li>
					<li><b>Closed</b> <p> When the account is set to Closed, it brings up a message when the client tries to log in, saying that the account no longer exist.</p></li>
					<li><b>Disabled</b> <p> A client will be notified when they try logging in that their account has been disabled due to violation of terms. He will be advised to contact the customer care to rectify the issue.</p></li>
					
				<li><b>	Suspend</b> <p>

A client will be notified when they try logging in that their account has been disabled due to violation of terms. He will be advised to contact the customer care to rectify the issue.</p></li>
                </ul>
				</article>
               
               
               
               
          </div>
        </div>
      </div>
     </div>
 
    
       <?php include 'foot.php'; ?>