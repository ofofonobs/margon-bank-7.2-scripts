<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';
if(!isset($_SESSION['acc_no'])){
	
header("Location: login.php");
exit(); 
}
$user_home = new USER();



$stmt = $user_home->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


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
    
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0"> You can see messages sent from/to our 24/7 Customer care here.</h3>
                </div>
                
              </div>
            </div>
            <div class="card-body">
              
              
            <form autocomplete="off" method="post" >
                         
                
               <div class="mail-box-container">
		                <!-- BEGIN scrollbar -->
		                <div data-scrollbar="true" data-height="100%">
		                    <!-- END table-email -->
							
							<?php 
								$reci_name = $row['uname'];
								$msg = $user_home->runQuery("SELECT * FROM message INNER JOIN account ON message.reci_name= account.uname  WHERE account.uname = '$reci_name'");
								$msg->execute(array(":reci_name"=>$_SESSION['uname']));
								while($show = $msg->fetch(PDO::FETCH_ASSOC)){?>
								
		                    <ul class="email-list">
								<li class="<?php echo $show['read']; ?>">
								
									<div class="email-message">
										<a href="message_view.php?subject=<?php echo $show['subject']; ?>">
											<div class="email-sender">
												<span class="email-time"><?php echo $show['date']; ?></span>
												<?php echo $show['sender_name']; ?>
											</div>
											<div class="email-title"><?php echo $show['subject']; ?></div>
										</a>
									</div>
								</li>
								
		                    </ul>
							<?php } ?>
							
		                    <!-- END table-email -->
		                </div>
		                <!-- END scrollbar -->
		            </div>
               
                
              </form>
              
              
              
              
              
            </div>
          </div>
        </div>
      </div>
      
      
      
       
      
      
     
      <!-- Footer -->
       <?php include 'footercopyright.php'; ?>
      
     