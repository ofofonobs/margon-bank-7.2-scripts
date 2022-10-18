<?php
session_start();
ini_set("include_path", '/home/dfbsonli/php:' . ini_get("include_path") );
require('../include/dbconfig.php');
require_once '../include/class.user.php';
$reg_user = new USER();
$acc_no = $_SESSION['acc_no'];
$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$acc_no'");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);


if(!isset($_SESSION['acc_no']) && $row['phone_verify'] == 0){
      header('Location: login.php');
      exit();
}

if (isset($_SESSION['acc_no']) && $row['phone_verify'] == 1) {
    header('Location: pin_auth.php');
    exit();
}
 
                        $reg_user = new USER();

                        $acc_no = $_SESSION['acc_no'];
                        $stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$acc_no'");
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);

                        if (isset($_POST['otp'])) {
                            if ($_POST['otp'] === $row['tmp_otp']) {
                                $queri = " UPDATE account SET phone_verify = '1' WHERE acc_no ='$acc_no'";
                                $resulti = mysqli_query($connection, $queri) or die(mysqli_error($connection));
                                header("Location: pin_auth.php");
                            } else {
                                echo "<p style='text-decoration:bold;'>Oops!! you have entered a wrong otp code.</p>";
                            }
                        }
                        ?>


<html>

<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Verify</title>
  <style>

        body {
        background-color: #F3EBF6;
        font-family: 'Ubuntu', sans-serif;
    }
    
    .main {
        background-color: #FFFFFF;
        width: 400px;
        height: 400px;
        margin: 7em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }
    
    .sign {
        padding-top: 40px;
        color: #0000cc;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 20px;
    }
    
    .un {
    width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
    form.form1 {
        padding-top: 40px;
    }
    
    .pass {
            width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
   
    .un:focus, .pass:focus {
        border: 2px solid rgba(0, 0, 0, 0.18) !important;
        
    }
    
    .submit {
      cursor: pointer;
        border-radius: 5em;
        color: #fff;
        background: linear-gradient(to right, #0000cc, #0000cc);
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 35%;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }
    
    .forgot {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        padding-top: 15px;
    }
    
    a {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        text-decoration: none
    }
    
    @media (max-width: 600px) {
        .main {
            border-radius: 0px;
        }
        
        
</style>

</head>

<body>
 <?php
                    if (isset($_GET['inactive'])) {
                        ?>
                        <div class='alert alert-info col-4'>
                            <button class='close' data-dismiss='alert'>&times;</button>
                            <strong>Sorry!</strong> This Account is not Activated Contact CustomerCare to Activate it. 
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($msg)) {
                        echo $msg;
                    }
                    ?>
  
            
                
 
	 <div class="main">
                      <p class="sign" align="center"> Please, insert the code<br> sent to your email/Phone!</p>
                       


                   
                    <!-- END login-desc -->
                    <!-- BEGIN login-form -->
                    <form method="POST">
                        <form class="form1">
                            
                            <input type="text" name="otp" class="un " placeholder="Enter One Time Passcode (OTP)" autofocus />

                        <button type="submit" name="login"  class="submit" align="center" >PROCEED</button>
                        <br><br><br>  <footer class="">
                           <p style="text-align: center;"> &copy;  BANK Rights Reserved.</p>

                        </footer>
             </div>    </div>



                </form>
     
</body>

</html>

