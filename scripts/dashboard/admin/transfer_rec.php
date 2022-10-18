<?php
session_start();
require_once 'class.admin.php';

include_once ('session.php');
if(!isset($_SESSION['email'])){
	
header("Location: login.php");

exit(); 
}
$user_home = new USER();


$stmt = $user_home->runQuery("SELECT * FROM transfer ORDER BY id DESC LIMIT 200");
$stmt->execute();

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
              <h3 class="mb-0"><a href=""   class="btn btn-danger">ALL TRANSFER RECORDS</a></h3>
            </div>
          
           <div class="card-body">
               
               
              
            
               
                     <div class="table-responsive">
                        <table class="table table-bordered table-hover tile">
                            <thead>
                                <tr>
                                    <th>#</th>
									<th>User Sender Mail</th>
									<th>Amount Transfered</th>
                                    <th>Account Transfered To</th>
                                    <th>Bank</th>
                                    <th>Account Name</th>
                                    <th>Remarks</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
	<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['amount']; ?></td>
                                    <td><?php echo $row['acc_no']; ?></td>
                                    <td><?php echo $row['bank_name']; ?></td>
                                    <td><?php echo $row['acc_name']; ?></td>
                                    <td><?php echo $row['remarks']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    
                                </tr>
    <?php }?>                           
                            </tbody>
                        </table>
                    </div>
               
               
               
               
               
          </div>
        </div>
      </div>
     </div>
 
    
       <?php include 'foot.php'; ?>