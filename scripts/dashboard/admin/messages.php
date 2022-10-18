<?php
session_start();
require_once 'class.admin.php';
include_once ('session.php');
if(!isset($_SESSION['email'])){
	
header("Location: login.php");

exit(); 
}
$reg_user = new USER();


$account = $reg_user->runQuery("SELECT * FROM account");
$account->execute();
$stmt = $reg_user->runQuery("SELECT * FROM message ORDER BY id DESC LIMIT 200");
$stmt->execute();

if(isset($_POST['message']))
{
	
	$sender_name = trim($_POST['sender_name']);
	$sender_name = strip_tags($sender_name);
	$sender_name = htmlspecialchars($sender_name);
	
	$reci_name = trim($_POST['reci_name']);
	$reci_name = strip_tags($reci_name);
	$reci_name = htmlspecialchars($reci_name);
	
	$subject = trim($_POST['subject']);
	$subject = strip_tags($subject);
	$subject = htmlspecialchars($subject);
	
	$msg = trim($_POST['msg']);
	$msg = strip_tags($msg);
	$msg = htmlspecialchars($msg);
	
	
	
	
		if($reg_user->message($sender_name,$reci_name,$subject,$msg))
		{			
			$id = $reg_user->lasdID();	
			
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Sent!</strong>.
                     
			  		</div>
					";
		}
		else
		{
			echo "Sorry, Message was not sent";
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

        <title>| Admin - Messages</title>
            
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
    <body id="skin-blur-kiwi">

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
                    
                    <div class="media-body">
                        <input type="text" class="main-search">
                    </div>
                </div>
            </div>
        </header>
        
        <div class="clearfix"></div>
        
        <section id="main" class="p-relative" role="main">
         <a href="index.php">DASHBOARD</a> 
            <!-- Content -->
            <section id="content" class="container">
            <h4 class="page-title block-title">Messages</h4>
			<?php if(isset($msg)) echo $msg;  ?>
                <div class="block-area" id="tableHover">
                    <h3 class="block-title">View,Send And Delete All Sent Messages</h3>
                <!-- Main Widgets -->
               
                 <div class="message-list list-container">
                    <header class="listview-header media">
                        <input type="checkbox" class="pull-left list-parent-check" value="">
                            
                        
                        
                        <ul class="list-inline list-mass-actions pull-left">
                            <li>
                                <a data-toggle="modal" href="#compose-message" title="Compose Message" class="tooltips">
                                    <i class="sa-list-add">COMPOSE</i>
                                </a>
                            </li>
                           
                           
                            <li class="show-on" style="display: none;">
                                <a href="" title="Delete" class="tooltips">
                                    <i class="sa-list-delete"></i>
                                </a>
                            </li>
                        </ul>

                         <div class="clearfix"></div>
                    </header>
					
					<div class="media" >
					<input type="checkbox" class="pull-left">
                        <a class="media-body" href="">
                            <div class="pull-left list-title">
                                <span class="t-overflow f-bold" style="font-size:140%;">Sender</span>
                            </div>
							<div class="pull-left list-title">
                                <span class="t-overflow f-bold" style="font-size:140%;">To</span>
                            </div>
                            <div class="pull-right list-date" style="font-size:140%;">Date</div> 
                            
                            <div class="media-body hidden-xs">
                                <span class="t-overflow" style="font-size:140%;">Message</span>
                            </div>
                        </a>
                    </div>
                    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                    <div class="media">
                       
<a href="decmessage.php?id=<?php echo $row['id']; ?>" title="Delete " rel="tooltip" class="pull-left list-check"><i class="fa fa-ban"></i>DELETE</a>
                        <a class="media-body" >
							
                            <div class="pull-left list-title">
                                <span class="t-overflow f-bold"><?php echo $row['sender_name']; ?></span>
                            </div>
							<div class="pull-left list-title">
                                <span class="t-overflow f-bold"><?php echo $row['reci_name']; ?></span>
                            </div>
                            <div class="pull-right list-date"><?php echo $row['date']; ?> || </div> 
                            <div class="media-body hidden-xs">
                                <span class="t-overflo"><?php echo $row['msg']; ?></span>
                            </div>
							 
                        </a>
                    </div><br>
                     <?php }?>
                </div>
                
                <!-- Compose -->
                <div class="modal fade" id="compose-message">
                    <div class="modal-dialog">
                        <div class="modal-content">
						<form class="form-group" method="POST">
                            <div class="modal-header">
							
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Compose Message</h4>
                            </div>
                            <select class="form-control primary" name="sender_name">
                                <option class="form-control" >Sender</option>
                                <option class="form-control" style="background-color:#000" value="Customer Care">Customer Care</option>
                                <option class="form-control" style="background-color:#000" value="Account Officer">Account Officer</option>
                                <option class="form-control" style="background-color:#000" value="Service Department">Service Department</option>
                            </select>
							<select class="form-control primary"name="reci_name">
                                <option class="form-control" >To</option>
								<?php while($show = $account->fetch(PDO::FETCH_ASSOC)){?>
                                <option class="form-control" style="background-color:#000" value="<?php echo $show['uname']; ?>"><?php echo $show['fname']; ?> <?php echo $show['lname']; ?></option>
                                <?php }?>
                            </select>
                            <div class=" form-control">
                                <input type="text" class="form-control input-transparent" name="subject" placeholder="Subject...">
                            </div>
                            <div class="p-relative">
                                <div class="message-options">
                                    <img src="img/icon/tile-actions.png" alt="">
                                </div>
                                <textarea class="message-editor form-control" name="msg" placeholder="Message..."></textarea>
                            </div>
                            <div class="modal-footer m-0">
                                <button class="btn" data-dismiss="modal">Cancel</button>
								<button class="btn" type="subit" name="message">Send</button>
                            </div>
						</form>
                        </div>
                    </div>
                </div>
                
            </section>
                            
                            <div class="clearfix"></div>
                        </div>
                        
						<div class="clearfix"></div>
                    </div>
                </div>
                
                
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
        

        <script src="js/sparkline.min.js"></script> <!-- Sparkline - Tiny charts -->
        <script src="js/easypiechart.js"></script> <!-- EasyPieChart - Animated Pie Charts -->
        <script src="js/charts.js"></script> <!-- All the above chart related functions -->

        <!--  Form Related -->
        <script src="js/icheck.js"></script> <!-- Custom Checkbox + Radio -->

        <!-- UX -->
        <script src="js/scroll.min.js"></script> <!-- Custom Scrollbar -->
		 <!-- Text Editor -->
        <script src="js/editor.min.js"></script> <!-- WYSIWYG Editor -->
        <!-- Other -->
        <script src="js/calendar.min.js"></script> <!-- Calendar -->
        <script src="js/feeds.min.js"></script> <!-- News Feeds -->
        

        <!-- All JS functions -->
        <script src="js/functions.js"></script>
		<script type="text/javascript">
            $(document).ready(function(){
                //Editor
                $('.message-editor').summernote({
                    toolbar: [
                      //['style', ['style']], // no style button
                      ['style', ['bold', 'italic', 'underline', 'clear']],
                      ['fontsize', ['fontsize']],
                      ['color', ['color']],
                      ['para', ['ul', 'ol', 'paragraph']],
                      //['height', ['height']],
                      ['insert', ['picture', 'link']], // no insert buttons
                      //['table', ['table']], // no table button
                      //['help', ['help']] //no help button
                    ],
                    height: 200,
                    resizable: false
                });
                
                $('.message-options').click(function(){
                    $(this).closest('.modal').find('.note-toolbar').toggle(); 
                });  
            });
        </script>
    </body>
</html>
