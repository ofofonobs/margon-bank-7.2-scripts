<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';

if (!isset($_SESSION['acc_no'])) {
	
header("Location: login.php");
exit(); 
}
;

if ($_SERVER['HTTP_REFERER'] == $url) {
  header('Location: logout.php'); //redirect to some other page
  exit();
}
$reg_user = new USER();
$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['code'])){
	$pin_auth = $row['pin_auth'];
	$sub = $_POST['pin_auth'];
	if($sub !== $pin_auth){
		header("Location: pin_auth.php?errorpin");
	}
	else {
		header("Location: summary.php");
	$sql = " UPDATE account SET phone_verify = '0' WHERE acc_no ='$acc_no'";
	}
}
	
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../dist/assets/images/favicon.png">
    <title>Enter Login Pin To Continue</title>
    
    <!-- page css -->
    <link href="../dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Authenticating</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../dist/assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <?php 
							if(isset($_GET['errorpin']))
								{
									?>
									<div class='alert alert-danger'>
										<button class='close' data-dismiss='alert'>&times;</button>
										<strong>Invalid PIN Code! Unable to Proceed.</strong> 
									</div>
									<?php
								}
						?>
							<?php if(isset($errorpin)){ echo $errorpin;}?>
                    <form class="form-horizontal form-material" id="loginform" method="POST">
                        <div class="form-group">
                            <div class="col-xs-12 text-center">
                                <div class="user-thumb text-center"> <img alt="thumbnail" class="img-circle" width="100" src="admin/pic/<?php echo $row['uname']; ?>.jpg">
                                    <h3> <?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="pin_auth" required="" placeholder="password">
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" name="code" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../dist/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../dist/assets/node_modules/popper/popper.min.js"></script>
    <script src="../dist/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        
    </script>
</body>

</html>