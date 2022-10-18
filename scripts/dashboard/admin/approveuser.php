<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-update']))
{
	$id = $_GET['edit_id'];
	$acc_no = $_POST['acc_no'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$pin_auth = $_POST['pin_auth'];
	$pin = $_POST['pin'];
	$uname = $_POST['uname'];
	$phone = $_POST['phone'];
	$reg_date = $_POST['reg_date'];
	$addr = $_POST['addr'];
	$dob = $_POST['dob'];
	$marry = $_POST['marry'];
	$t_bal = $_POST['t_bal'];
	$a_bal = $_POST['a_bal'];
	$currency = $_POST['currency'];
	$cot = $_POST['cot'];
	$tax = $_POST['tax'];
	$imf = $_POST['imf'];
	$upass = $_POST['upass'];
	$phone_verify = $_POST['phone_verify'];
	$verify = $_POST['verify'];
	
	
	if($crud->updateapprove($id,$acc_no,$fname,$lname,$email,$pin_auth,$pin,$uname,$phone,$reg_date,$addr,$dob,$marry,$t_bal,$a_bal,$currency,$cot,$tax,$imf,$upass,$phone_verify,$verify))
	{
	


            $msg1 = "
					<div class='alert alert-info'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong> Account Has Been Successfully Created!
                   
			  		</div>
					";
        } else 	{
		$msg = "<div class='alert alert-warning'>
				<strong>SORRY!</strong> ERROR while updating record !
				</div>";
	}
}

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getID($id));	
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
    <link rel="icon" type="image/png" sizes="16x16" href="../../dist/assets/images/favicon.png">
    <title>Edit User Account - Super Admin</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
 <!-- Bootstrap 3.3.4 -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
	 <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="horizontal-nav skin-megna fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i>MENU</a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                       
                    </ul>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
              &nbsp;   &nbsp;  <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                       &nbsp;   <li class="nav-item"> <b>&nbsp;BNI ADMIN PANEL</b> </li>
                        
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                       
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- mega menu -->
                        <!-- ============================================================== -->
                      
                        <!-- ============================================================== -->
                        <!-- End mega menu -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="icons/admin.png" alt="user" class=""> <span class="hidden-md-down"><?php echo $row['uname']; ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                           
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
                      
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
 <?php include 'menu.php';?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                     <?php
if(isset($msg))
{
	echo $msg;
}
?>

 <?php
if(isset($msg1))
{
	echo $msg1;
}
?>
                <div class="row page-titles">
                   
                   <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Edit User Account</h4>
                    </div>
<div class="clearfix"></div><br />

<div class="container-fluid">
	<form method='post' class=''>
 
         <div class="form-group col-md-3">
            <label for="name">Account Num</label>
			<input id="name" name="acc_no" class="form-control" type="text" value="<?php echo $acc_no;?>"  />
        </div>
		
        <div class="form-group col-md-3">
            <label for="name">First Name</label>
			<input id="name" name="fname" class="form-control" type="text" value="<?php echo $fname;?>"  />
        </div>
 
        <div class="form-group col-md-3">
			<label for="email">Last Name</label>
			<input id="lname" name="lname" class="form-control" type="text" value="<?php echo $lname;?>" />
        </div>
 
        <div class="form-group col-md-3">
            <label for="website">Email</label>
			<input id="website" name="email" class="form-control" type="text" value="<?php echo $email;?>" />
        </div>
 
        <div class="form-group col-md-3">
			<label for="contact">LOGIN PIN </label>
			<input id="contact" name="pin_auth" class="form-control" type="text" value="<?php echo $pin_auth;?>" required />
        </div>
		
		<div class="form-group col-md-3">
			<label for="job">Transfer PIN</label>
			<input id="job" name="pin" class="form-control" type="text" value="<?php echo $pin;?>" required />
        </div>
		
		<div class="form-group col-md-3">
			<label for="company">User Name</label>
			<input id="company" name="uname" class="form-control" type="text" value="<?php echo $uname;?>" required />
        </div>
		
		
         <div class="form-group col-md-3">
            <label for="name">Phone</label>
			<input id="name" name="phone" class="form-control" type="text" value="<?php echo $phone;?>"  />
        </div>
		
        
 
        <div class="form-group col-md-3">
			<label for="email">Reg. Date</label>
			<input id="lname" name="reg_date" class="form-control" type="text" value="<?php echo $reg_date;?>" />
        </div>
 
       
        
          
 
        <div class="form-group col-md-3">
			<label for="contact">Address </label>
			<input id="contact" name="addr" class="form-control" type="text" value="<?php echo $addr;?>" required />
        </div>
		
		
		
		<div class="form-group col-md-3">
		<label for="company">Date Of Birth<small>(dd/MM/yyyy)</small></label>
			<input id="company" name="dob" class="form-control" type="text" value="<?php echo $dob;?>" required />
        </div>
		
		
         <div class="form-group col-md-3">
            <label for="name">Marital Status</label>
		<select name="marry" class="form-control input-sm validate[required]">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Divorced">Divorced</option>
                                </select>
        </div>
		
        <div class="form-group col-md-3">
            <label for="name">Total Balance</label>
			<input id="name" name="t_bal" class="form-control" type="number" value="<?php echo $t_bal;?>" />
		 </div>
 
        <div class="form-group col-md-3">
			<label for="email">Available Balance</label>
			<input id="lname" name="a_bal" class="form-control" type="number" value="<?php echo $a_bal;?>" />
        </div>
 
        <div class="form-group col-md-3">
            <label for="website">Currency</label>
			<input id="website" name="currency" class="form-control" type="text" value="<?php echo $currency;?>" />
        </div>
 
        <div class="form-group col-md-3">
			<label for="contact">COT </label>
			<input id="contact" name="cot" class="form-control" type="text" value="<?php echo $cot;?>" required />
        </div>
		
		<div class="form-group col-md-3">
			<label for="job">TAX</label>
			<input id="job" name="tax" class="form-control" type="text" value="<?php echo $tax;?>" required />
        </div>
		
		<div class="form-group col-md-3">
			<label for="company">IMF</label>
			<input id="company" name="imf" class="form-control" type="text" value="<?php echo $imf;?>" required />
        </div>
		
		
         <div class="form-group col-md-3">
			<label for="company">Change Password</label>
			<input id="company" name="upass" class="form-control" type="text" value="<?php echo $upass;?>"  />
        </div>
		
	
        
        	<div class="form-group col-md-3">
			<label for="company">Phone Verify</label>
			<input id="company" name="phone_verify" class="form-control" type="text" value="<?php echo $phone_verify;?>" required />
        </div>
        
        <div class="form-group col-md-3">
			<label for="company">Verify</label>
			<input  name="verify" class="form-control" type="text" value="<?php echo $verify;?>" required />
        </div>
        
        
        
		<div class="clearfix"></div>
            <br />
        <table>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Update Customer
				</button>
                <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
            </td>
        </tr>
        </table>
</form> 


</div>






                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme working">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>NEED HELP?</b></li>
                                <li><b>TALK TO MR SAM</b></li>
                                <li><b><a href="https://wa.me/2348188730307">SMS/WHATSAPP ME</a></b></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2019 
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../dist/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="../../dist/assets/node_modules/popper/popper.min.js"></script>
    <script src="../../dist/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="../../dist/assets/node_modules/raphael/raphael-min.js"></script>
    <script src="../../dist/assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="../../dist/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Popup message jquery -->
    <script src="../../dist/assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Chart JS -->
    <script src="dist/js/dashboard1.js"></script>
    <script src="../../dist/assets/node_modules/toast-master/js/jquery.toast.js"></script>
    
     <!-- This is data table -->
    <script src="../../dist/assets/node_modules/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
    
</body>

</html>