<?php
session_start();
include_once ('../include/session.php');

require_once '../include/class.user.php';
if (!isset($_SESSION['acc_no'])) {

    header("Location: login.php");
    exit();
}


$reg_user = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no" => $_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($stat == 'Dormant/Inactive') {
    header('Location: summary.php?dormant');
    exit();
}
if (isset($_POST['reset-pass'])) {
    $pass = $_POST['upass1'];
    $cpass = $_POST['upass'];

    if ($cpass !== $pass) {
        $msg = "<div class='alert alert-danger'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Sorry!</strong>  Passwords Doesn't match. 
						</div>";
    } else {

        //notify the user via email and sms - your password has been changed

        if (($_POST['oldpass']) == $row['upass']) {
            $timezone = date_default_timezone_get();
            date_default_timezone_set($timezone);
            $date = date('m/d/Y h:i:s a', time());
            $subject = "Password successfully changed!";
            $message = "Dear " . $row['fname'] . " your Internet banking password has been changed " . $date . " if you did't do it ,Contact customercare Immediately";
            $reg_user->send_mail($row['email'], $message, $subject);
            $phone = preg_replace('/[^0-9]/', '', $row['phone']);
            $mobile_msg = "Dear " . $row['fname'] . " your Internet banking password has been changed " . $date . " if you did't do it ,Contact customercare Immediately";
            //$reg_user->otp($phone,$mobile_msg);


            $password = ($cpass);
            $stmt = $reg_user->runQuery("UPDATE account SET upass=:upass WHERE acc_no=:acc_no");
            $stmt->execute(array(":upass" => $password, ":acc_no" => $_SESSION['acc_no']));

            $msg = "<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						Password Changed!
						</div>";
        } elseif (empty($pass) || empty($cpass)) {
            $msg = "<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						Fill out the new and confirm password!
						</div>";
        } else {
            $msg = "<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						Old Password doesn't match!
						</div>";
        }
    }
}
if(isset($_POST['save_profile_image'])){
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $name = $file['name'];

        $path = pathinfo($name, PATHINFO_EXTENSION);

        $allowed = array('jpg', 'png', 'jpeg');


        $folder = "/admin/pic/";
        $n =time().$name;

        $destination = $folder . $n;


    }
    move_uploaded_file($file_tmp,"admin/pic/".$n);
    $stmt = $reg_user->runQuery("UPDATE account SET image=:image WHERE acc_no=:acc_no");
    $stmt->execute(array(":image" => $n, ":acc_no" => $_SESSION['acc_no']));


            if(true){
                $msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						  Image Successfully Uploaded!
                   
			  		</div>
					";
        }
}



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
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card bg-gradient-default shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                
                <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">Change Account Profile / Password</span>
                        <span class="d-md-none">M</span>
                      </a>
                    </li>
                
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">


                <form action="" method="post" enctype="multipart/form-data">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label" style="color:white;">Profile Pics</label>
                            <input type="file" name="image" id="" class="form-control">
                        </div>

                        <div class="text-center mb-3">
                            <button class="btn btn-primary" type="submit" name="save_profile_image">Upload</button>
                        </div>
                    </div>
                </form>
             
              <form method="POST">
                                <div class="panel-body">
                                    <?php
                                    if (isset($msg)) {
                                        echo $msg;
                                    }
                                    ?>

                                    <div>
                                        <h3 class="text-white text-center">Change Account Password</h3>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label" style="color:white;">Old Password</label>
                                        <div class="input-group date" >
                                            <input type="password" class="form-control" name="oldpass" placeholder="********" />
                                             
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" style="color:white;">New Password </label>
                                        <div class="input-group date" >
                                            <input type="password" class="form-control" name="upass1" placeholder="********" />
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" style="color:white;">Retype New Password </label>
                                        <div class="input-group date" >
                                            <input type="password" class="form-control" name="upass" placeholder="********" />
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-danger" name="reset-pass" value="Update Password">
                                    </div>
                                </div>
                            </form>      
             
             
             
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col"> 
                   <b>Security Tips</b> <P>Change your Internet banking Password Frequently to keep your Account Safe <a href="editpass.php" class="btn btn-sm btn-primary">Reset Password</a></P>
                    
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
     
      <!-- Footer -->
       <?php include 'footercopyright.php'; ?>
      
     