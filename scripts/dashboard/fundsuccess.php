<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';
if(!isset($_SESSION['acc_no'])){
	
header("Location: login.php");

exit(); 
}
$url != '';

if ($_SERVER['HTTP_REFERER'] == $url) {
  header('Location: dom.php'); //redirect to some other page
  exit();
}

$reg_user = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$email = $row['email'];

$temp = $reg_user->runQuery("SELECT * FROM transfer WHERE email = '$email' ORDER BY id DESC LIMIT 1");
$temp->execute(array(":acc_no"=>$_SESSION['acc_no']));
$rows = $temp->fetch(PDO::FETCH_ASSOC);

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
              <div class="">
                 
                 <center> <h1 class="mb-0" style="color:green; font-weight:700;">TRANSACTION CONFIRMATION</h1></center>
           
            
              </div>
            </div>
            <div class="card-body">
              
              
              
              <form autocomplete="off" method="post" >
                  
                  
          <center>  <img src="success.png" style="height:80px; width:80px;  "/>
          <br>
          <h4 style="color:green;">    You have successfully Transfered <?php echo $row['currency']?><?php echo $rows['amount']?> to Account Number <?php echo $rows['acc_no']?> Belonging to <?php echo $rows['acc_name']?>
          of <?php echo $rows['bank_name']?></h4>
                        
            <a href="summary.php" class="btn btn-sm btn-success">OKAY</a></center> 
                  
               <hr> 
           <center> <p style="color:red">Check your registered email or mobile number for transaction receipt</p>   </center> 
              </form>
              
              
              
              
              
            </div>
          </div>
        </div>
      </div>
      
      
         
      <script>
const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.mdb.modal', () => {
  myInput.focus()
})
 </script>
 <div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
          Close
        </button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
       
      
      
     
      <!-- Footer -->
       <?php include 'footercopyright.php'; ?>
      
     