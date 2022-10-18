<?php
session_start();
require_once 'class.admin.php';
include_once ('session.php');
if(!isset($_SESSION['email'])){
	
header("Location: login.php");

exit(); 
}
$user_home = new USER();



$stmt = $user_home->runQuery("SELECT * FROM account ORDER BY id DESC");
$stmt->execute();

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
              <h3 class="mb-0"><a href=""   class="btn btn-danger">ALL CUSTOMER ACCOUNT</a></h3>
            </div>
          
           <div class="card-body">
               
               
              
            
               
                <div class="table-responsive ">
                        <table class=" table-headertable table-bordered table-hover tile" id="table">
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
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
	<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        ?>
                                <tr id="list">
                                   
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
                                        <a href="./edit-account.php?id=<?=$row['id']?>" class="btn btn-primary">Edit</a>
                                    </td>
                                    
                                </tr>
                                
                                <tr colspan="17"> <div id="list_index" style="color:green;" class="box"></div></tr>
           
                                <br/>

            <script type="text/javascript">
window.addEventListener("load", function () {
    paginator({
        get_rows: function () {
            return document.getElementById("list").getElementsByTagName("td");
        },
        box: document.getElementById("list_index"),
        active_class: "color_page"
    });
}, false);
            </script>
    <?php }?>                     
    
     
                            </tbody>
                        </table>
                    </div>
               
               
               
               
               
               
               
               
          </div>
        </div>
      </div>
     </div>
 
    
       <?php include 'foot.php'; ?>