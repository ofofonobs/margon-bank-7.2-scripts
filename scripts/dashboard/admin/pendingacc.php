<?php
session_start();
include_once ('session.php');
if(!isset($_SESSION['email'])){
	
header("Location: login.php");

exit(); 
}
require_once 'class.admin.php';
$user_home = new USER();



$stmt = $user_home->runQuery("SELECT * FROM account WHERE verify ='N' ORDER BY id DESC LIMIT 200");
$stmt->execute();

if(isset($_GET['id'])){
	
$id=$_GET['id'];
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
              <h3 class="mb-0"><a href=""   class="btn btn-danger">PENDING ACCOUNTS</a></h3>
            </div>
          
           <div class="card-body">
               
               
               
               
                <div class="table-responsive ">
                        <table class=" table-headertable table-bordered table-hover tile">
                            <thead>
                                <tr class=" fixed_header">
                                    
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Account No</th>
                                    <th>Pass</th>
                                    <th>Email</th>
                                    <th>Sex</th>
                                    <th>Account Type</th>
                                    <th>Total Balance</th>
                                    <th>Available Balance</th>
                                    <th>COT</th>
                                    <th>TAX</th>
                                    <th>IMF</th>
                                    <th>ACC PIN</th>
                                    <th>Currency</th>
                                    <th>Logins</th>
                                    <th>Status</th>
                                    <th>Reg Date</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
	<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>	
                                <tr>
                                   
                                    <td><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?><br></td>
                                    <td><?php echo $row['uname']; ?></td> 
                                    <td><?php echo $row['acc_no']; ?></td>
                                    <td><?php echo $row['upass']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['sex']; ?></td>
                                    <td><?php echo $row['type']; ?></td>
                                    <td><?php echo $row['t_bal']; ?></td>
                                    <td><?php echo $row['a_bal']; ?></td>
                                    <td><?php echo $row['cot']; ?></td>
                                    <td><?php echo $row['tax']; ?></td>
                                    <td><?php echo $row['imf']; ?></td>
                                    <td><?php echo $row['pin_auth']; ?></td>
                                    <td><center><?php echo $row['currency']; ?></center></td>
                                    <td><?php echo $row['logins']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['reg_date']; ?></td>
                                    <td>
										<a href="app.php?id=<?php echo $row['id']; ?>" rel="tooltip" name="update" title="Edit Account" class="btn btn-simple btn-info btn-icon "><i class="fa fa-edit"></i></a>
									</td>
                                    <td>
										<a href="delete.php?id=<?php echo $row['id']; ?>" name="delete" rel="tooltip"  class="btn btn-simple btn-danger btn-icon " title="Remove Account"><i class="fa fa-trash-o"></i></a>
									</td>
                                    
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