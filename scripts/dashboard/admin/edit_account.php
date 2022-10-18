<?php
session_start();
include_once ('session.php');
if(!isset($_SESSION['email'])){
	
header("Location: login.php");

exit(); 
}
require_once 'class.admin.php';

$reg_user = new USER();

if(isset($_GET['id'])){
	
$id=$_GET['id'];
$stmt = $reg_user->runQuery("SELECT * FROM account WHERE id='$id'");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if(isset($_POST['update']))
{	$fname = trim($_POST['fname']);
		
		
		$mname = trim($_POST['mname']);
		
		
		$lname = trim($_POST['lname']);
		
		
		$uname = trim($_POST['uname']);
		
		
		$upass = $_POST['upass'];
		
		$phone = trim($_POST['phone']);
		
		$email = trim($_POST['email']);
		
		$type = trim($_POST['type']);
		
		
		$work = trim($_POST['work']);
		
		
		$acc_no = trim($_POST['acc_no']);
		
		
		$addr = trim($_POST['addr']);

		
		$sex = trim($_POST['sex']);
		
		
		$dob = trim($_POST['dob']);
		
		
		$marry = trim($_POST['marry']);
		
		
		$t_bal = trim($_POST['t_bal']);
		
		
		$a_bal = trim($_POST['a_bal']);
		
	if($reg_user->update($fname,$mname,$lname,$uname,$upass,$phone,$email,$type,$work,$acc_no,$addr,$sex,$dob,$marry,$t_bal,$a_bal))
	{
		$fname = trim($_POST['fname']);
		
		
		$mname = trim($_POST['mname']);
		
		
		$lname = trim($_POST['lname']);
		
		
		$uname = trim($_POST['uname']);
		
		
		$upass = $_POST['upass'];
		$upass = md5($upass);
		
		$phone = trim($_POST['phone']);
		
		$email = trim($_POST['email']);
		
		$type = trim($_POST['type']);
		
		
		$work = trim($_POST['work']);
		
		
		$acc_no = trim($_POST['acc_no']);
		
		
		$addr = trim($_POST['addr']);

		
		$sex = trim($_POST['sex']);
		
		
		$dob = trim($_POST['dob']);
		
		
		$marry = trim($_POST['marry']);
		
		
		$t_bal = trim($_POST['t_bal']);
		
		
		$a_bal = trim($_POST['a_bal']);
		
		$cot = trim($_POST['cot']);
		
		
		$tax = trim($_POST['tax']);
		
		
		$imf = trim($_POST['imf']);
		
		$currency = trim($_POST['currency']);
		
		
	
	$editaccount = $reg_user->runQuery("UPDATE account SET fname = '$fname', mname = '$mname', lname = '$lname', uname = '$uname', upass = '$upass', phone = '$phone', email = '$email', type = '$type', work = '$work', acc_no = '$acc_no', addr = '$addr', sex = '$sex', dob = '$dob', marry = '$marry', t_bal = '$t_bal', a_bal = '$a_bal', cot = '$cot', tax = '$tax', imf = '$imf', currency = '$currency'  WHERE id ='$id'");
	$editaccount->execute();
	
	
	
		$msg = "
		      <div class='alert alert-success'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong> Account Was Successfully Updated!</strong>
			  </div>
			  ";
		
	}
}

    
      
   
?>


<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="">
        <meta name="keywords" content="">
		<link rel="icon" href="img/favicon.png" type="image/x-icon">

        <title>Intercontinental Reserve | Admin - Edit Account</title>
            
        <!-- CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/form.css" rel="stylesheet">
        <link href="css/calendar.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/icons.css" rel="stylesheet">
        <link href="css/generics.css" rel="stylesheet"> 
    </head>
    <body id="skin-blur-nexus">

        <header id="header" class="media">
            <a href="index.php" id="menu-toggle"></a> 
            <a class="logo pull-left" href="index.php"><img src="" class="img-responsive" alt=""></a>
            
            <div class="media-body">
                <div class="media" id="top-menu">
                    
                    <div id="time" class="pull-right">
                        <span id="hours"></span>
                        :
                        <span id="min"></span>
                        :
                        <span id="sec"></span>
                    </div>
                    
                    
                </div>
            </div>
        </header>
        
        <div class="clearfix"></div>
        
        <section id="main" class="p-relative" role="main">
            
            <!-- Sidebar -->
             <aside id="sidebar">
                
                <!-- Sidbar Widgets -->
                <div class="side-widgets overflow">
                    <!-- Profile Menu -->
                    <div class="text-center s-widget m-b-25 dropdown" id="profile-menu">
                        <a href="index.php" data-toggle="dropdown">
                            <img class="profile-pic animated" src="img/htb.jpg" alt="">
                        </a>
                        <ul class="dropdown-menu profile-menu">
                            
                            <li><a href="logout.php">Sign Out</a> <i class="fa fa-sign-out icon left">&#61903;</i><i class="icon right fa fa-sign-out">&#61815;</i></li>
							<li><a href="#edit" data-toggle="modal">Edit Profile</a><i class="right fa fa-edit fa-2x"></i></li>
						</ul>
                        <h4 class="m-0">Intercontinental Reserve</h4>
                      
                    </div>
                    
                    <!-- Calendar -->
                    <div class="s-widget m-b-25">
                        <div id="sidebar-calendar"></div>
                    </div>
                    
                    <!-- Feeds -->
                    <div class="s-widget m-b-25">
                        <h2 class="tile-title">
                           Developer Info
                        </h2>
						<div class="">
                        
                        <p><i class="fa fa-skype fa-2x"></i> mosaic_mos</p>
						</div>
                        <div class="s-widget-body">
                            <div id="news-feed"></div>
                        </div>
                    </div>
                    
                    <!-- Projects -->
                     
                </div>
                
                <!-- Side Menu -->
                <ul class="list-unstyled side-menu">
                    <li class="">
                        <a class="sa-side-home" href="index.php">
                            <span class="menu-item">Dashboard</span>
                        </a>
                    </li>
                    <li class="dropdown active">
                        <a class="sa-list-vcard" href="">
                            <span class="menu-item">Accounts</span>
                        </a>
						<ul class="list-unstyled menu-item">
                            <li><a href="create_account.php">Create Account</a></li>
                            <li><a href="view_account.php">View Accounts</a></li>
                            <li><a href="update.php">Update Accounts</a></li>
							<li><a href="upload.php">Upload Image</a></li>
						</ul>
                    </li>
                    <li>
                        <a class="sa-list-secret" href="pending_accounts.php">
                            <span class="menu-item">Pending Accounts</span>
                        </a>
                    </li>
                    <li>
                        <a class="sa-top-message" href="messages.php">
                            <span class="menu-item">Messages</span>
                        </a>
                    </li>
					<li>
                        <a class="sa-list-comment" href="tickets.php">
                            <span class="menu-item">Tickets</span>
                        </a>
                    </li>
					<li>
                        <a class="sa-list-database" href="credit_debit_list.php">
                            <span class="menu-item">Credit/Debit History</span>
                        </a>
                    </li>
					<li>
                        <a class="sa-list-cc" href="transfer_rec.php">
                            <span class="menu-item">Transaction Records</span>
                        </a>
                    </li>
					<li>
                        <a class="sa-list-cog" href="settings.php">
                            <span class="menu-item">Settings</span>
                        </a>
                    </li>
                   
                </ul>

            </aside>
			<section id="content" class="container">
			<h4 class="page-title block-title">Update Account</h4>
                                
                <!-- Required Feilds -->
                <div class="block-area" id="required">
				<?php if(isset($msg)) echo $msg;  ?>
                    <h4 class="">Set the value for each field</h4>
                    <form role="form" class="form-validation-1" method="POST" enctype="multipart/form-data">
                        
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label>first Name</label>
                                <input type="text" name="fname" class="input-sm validate[required] form-control" value="<?php echo $row['fname']; ?>">
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Middle Name (Optional)</label>
                                <input type="text" name="mname" class="input-sm form-control" value="<?php echo $row['mname']; ?>">
                            </div>
							<div class="col-md-3 form-group">
                                <label>Last Name</label>
                                <input type="text" name="lname" class="input-sm validate[required] form-control" value="<?php echo $row['lname']; ?>">
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Username</label>
                                <input type="text" name="uname" class="input-sm validate[required] form-control" value="<?php echo $row['uname']; ?>">
                            </div>
                        </div>
						<div class="row">
                            <div class="col-md-4 form-group">
                                <label>Password</label>
                                <input type="password" name="upass" class="input-sm validate[required] form-control" value="<?php echo $row['upass']; ?>">
                            </div>
                            
							<div class="col-md-4 form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="input-sm validate[required] form-control" value="<?php echo $row['phone']; ?>">
                            </div>
							<div class="col-md-4 form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="input-sm validate[required] form-control" value="<?php echo $row['email']; ?>">
                            </div>
                            
                        </div>
						<div class="row">
                            <div class="col-md-3 form-group">
                                <label>Occupation</label>
                                <input type="text" name="work" class="input-sm validate[required] form-control" value="<?php echo $row['work']; ?>">
                            </div>
                            <div class="col-md-2 form-group" id="date-time">
							
                            <label>Date of Birth</label>
                            <div class="input-icon datetime-pick date-only">
                                <input data-format="dd/MM/yyyy" name="dob" type="text" value="<?php echo $row['dob']; ?>" class="form-control input-sm" />
                                <span class="add-on">
                                    <i class="sa-plus"></i>
                                </span>
                            </div>
							</div>
							
							<div class="col-md-2 form-group">
                                <label>Marital Status</label>
                                <select name="marry" class="form-control input-sm validate[required]">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Divorced">Divorced</option>
                                </select>
                            </div>
							<div class="col-md-2 form-group">
                                <label>Gender</label>
                                <select  name="sex" class="form-control input-sm validate[required]">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
							<div class="form-group col-md-3">
								<label>Address</label>
								<textarea name="addr" class="input-sm validate[required] form-control" value="<?php echo $row['addr']; ?>" placeholder="<?php echo $row['addr']; ?>"></textarea>
							</div>
                        </div>
						<div class="row">
                            <div class="col-md-3 form-group">
                                <label>Account Type</label>
                                <select name="type" class="form-control input-sm validate[required]">
                                    <option value="Savings">Savings</option>
                                    <option value="Current">Current</option>
                                 </select>
                            </div>
							<div class="col-md-3 form-group" id="date-time">
							
                            <label>Registration Date</label>
                            <div class="input-icon datetime-pick date-only">
                                <input data-format="dd/MM/yyyy" type="text" value="<?php echo $row['reg_date']; ?>" class="form-control input-sm" />
                                <span class="add-on">
                                    <i class="sa-plus"></i>
                                </span>
                            </div>
							</div>
                            <div class="col-md-3 form-group">
                                <label>Total Balance</label>
                                <input type="number" name="t_bal" class="input-sm validate[required] form-control" value="<?php echo $row['t_bal']; ?>">
                            </div>
							<div class="col-md-3 form-group">
                                <label>Available Balance</label>
                                <input type="number" name="a_bal" class="input-sm validate[required] form-control" value="<?php echo $row['a_bal']; ?>">
                            </div>
						</div>
						<div class="row">
						<div class="col-md-3 form-group">
							<label>Account Number</label>
							 <input type="number" name="acc_no" class="input-sm validate[required] form-control" value="<?php echo $row['acc_no']; ?>">
                        </div>
						<div class="col-md-2 form-group">
							<label>COT</label>
							 <input type="text" name="cot" class="input-sm validate[required] form-control" value="<?php echo $row['cot']; ?>">
                        </div>
						<div class="col-md-2 form-group">
							<label>TAX</label>
							 <input type="text" name="tax" class="input-sm validate[required] form-control" value="<?php echo $row['tax']; ?>">
                        </div>
						<div class="col-md-2 form-group">
							<label>IMF</label>
							 <input type="text" name="imf" class="input-sm validate[required] form-control" value="<?php echo $row['imf']; ?>">
                        </div>
						<div class="col-md-3 form-group">
							<label>Currency</label>
							 <input type="text" name="currency" class="input-sm validate[required] form-control" value="<?php echo $row['currency']; ?>">
                        </div>
							
							
						</div>
                            
                        </div>
                        
                        <div class="clearfix"></div>
                        <br />
                       
                        <input class="btn btn-md" type="submit" name="update" value="Update Account">
                        
                    </form>
                </div>
                
                <hr class="whiter m-t-20" />
			</section>
          

            <!-- Older IE Message -->
            <!--[if lt IE 9]>
                <div class="ie-block">
                    <h1 class="Ops">Ooops!</h1>
                    <p>You are using an outdated version of Internet Explorer, upgrade to any of the following web browser in order to access the maximum functionality of this website. </p>
                    <ul class="browsers">
                        <li>
                            <a href="https://www.google.com/intl/en/chrome/browser/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Google Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Mozilla firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com/computer/windows">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://safari.en.softonic.com/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/downloads/ie-10/worldwide-languages">
                                <img src="img/browsers/ie.png" alt="">
                                <div>Internet Explorer(New)</div>
                            </a>
                        </li>
                    </ul>
                    <p>Upgrade your browser for a Safer and Faster web experience. <br/>Thank you for your patience...</p>
                </div>   
            <![endif]-->
        </section>
        
        <!-- Javascript Libraries -->
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script> <!-- jQuery Library -->
       

        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Charts -->
        <script src="js/validation/validate.min.js"></script> <!-- jQuery Form Validation Library -->
        <script src="js/validation/validationEngine.min.js"></script> <!-- jQuery Form Validation Library - requirred with above js -->
		<script src="js/sparkline.min.js"></script> <!-- Sparkline - Tiny charts -->
        <script src="js/easypiechart.js"></script> <!-- EasyPieChart - Animated Pie Charts -->
        <script src="js/charts.js"></script> <!-- All the above chart related functions -->
		<script src="js/datetimepicker.min.js"></script> <!-- Date & Time Picker -->
        

        <!-- UX -->
        <script src="js/scroll.min.js"></script> <!-- Custom Scrollbar -->

        <!-- Other -->
        <script src="js/calendar.min.js"></script> <!-- Calendar -->
        <script src="js/feeds.min.js"></script> <!-- News Feeds -->
        

        <!-- All JS functions -->
        <script src="js/functions.js"></script>
    </body>
</html>
