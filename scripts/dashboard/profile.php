<?php session_start();
include_once ('../include/session.php');
require_once ('../include/class.user.php');
if(!isset($_SESSION['acc_no'])){
header("Location: login.php");
exit();
}
$reg_user = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

include_once ('counter.php');?>

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
                  <h3 class="mb-0">My account</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="editpass.php" class="btn btn-sm btn-primary">Settings</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative"  value="<?php echo $row['uname']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" value="<?php echo $row['email']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative"  value="<?php echo $row['fname']; ?> ">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="<?php echo $row['lname']; ?>">
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Work/Employment</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative"  value="<?php echo $row['work']; ?> ">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Mobile Number</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" value="<?php echo $row['phone']; ?>">
                      </div>
                    </div>
                  </div>
                  
                     <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Gender</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative"  value="<?php echo $row['sex']; ?> ">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Marital Status</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative"  value="<?php echo $row['marry']; ?>">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Contact Address</label>
                        <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="<?php echo $row['addr']; ?>" type="text">
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
      
     