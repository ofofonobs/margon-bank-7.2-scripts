<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';
if (!isset($_SESSION['acc_no'])) {
    header("Location: ../login.php");
    exit();
}


$reg_user = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no" => $_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



$email = $row['email'];

$temp = $reg_user->runQuery("SELECT * FROM transfer WHERE email = '$email' ORDER BY id DESC LIMIT 3");
$temp->execute(array(":acc_no" => $_SESSION['acc_no']));
$rows = $temp->fetch(PDO::FETCH_ASSOC);


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
                  <b style="color:white;">Account Number: <?php echo $row['acc_no']; ?></b>
                </div>
                <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">Type: <?php echo $row['type']; ?></span>
                        <span class="d-md-none">M</span>
                      </a>
                    </li>
                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                        <span class="d-none d-md-block">Status: <?php echo $row['status']; ?></span>
                        <span class="d-md-none">W</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <canvas id="chart-sales" class="chart-canvas"></canvas>
              </div>
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
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="chart-orders" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Customer Transactions</h3>
                </div>
                <div class="col text-right">
                  <a onclick="window.location.href='statement.php'" class="btn btn-sm btn-success">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                       <th scope="col">
                                Type 
                              </th>
                              <th scope="col">
                               Amount
                              </th>
                              <th scope="col">
                                To/From 
                              </th>
                              <th scope="col">
                               Description
                              </th>
                              <th scope="col">
                                Date/Time 
                              </th>
                              <th scope="col">
                                Status
                              </th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
				$acc_no = $_SESSION['acc_no'];
				$debcre = $reg_user->runQuery("SELECT * FROM alerts WHERE uname = '$acc_no' ORDER BY id DESC LIMIT 3 ");
				$debcre->execute();
				while($rows = $debcre->fetch(PDO::FETCH_ASSOC)){?>
                  <tr>
                            <td scope="row"> 
                                <b><?php echo $rows['type']; ?></b>
                              </td>
                              <td>
                              <?php echo $row['currency']; ?> <?php echo $rows['amount']; ?>
                              </td>
                              <td >
                               <?php echo $rows['sender_name']; ?>
                              </td>
                              <td>
                               <?php echo $rows['remarks']; ?>
                              </td>
                              <td >
							  <?php echo $rows['date']; ?> &nbsp;<?php echo $rows['time']; ?>
                              </td>
                              <td class="btn btn-sm btn-warning">
                               <?php echo $rows['statz']; ?>
                              </td>
                  </tr>
                
                 	<?php } ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Last Transfer</h3>
                </div>
                <div class="col text-right">
                  <a href="" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Beneficiary Bank</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                     <th scope="col">Date/Time</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      <?php echo $rows['bank_name']; ?><br> <?php echo $rows['acc_no']; ?>
                    </th>
                   
                              <td >
                              <?php echo $row['currency']; ?> <?php echo $rows['amount']; ?>
                              </td>
                              <td>
                                <?php echo $rows['status']; ?>
                              </td>
                              
                              <td >
                               <?php echo $rows['date']; ?>
                              </td>
                    
                  </tr>
                 
                  
                 
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
       <?php include 'footercopyright.php'; ?>
      
     