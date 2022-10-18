<?php
include_once 'class.crud.php';
$id_user = $_GET['id'];

$msg = "";
if(isset($_POST['save_profile'])){
    $full_name = $_POST['full_name'];
    $acct_cot = $_POST['acct_cot'];
    $acct_tax = $_POST['acc_tax'];
    $acct_imf = $_POST['acct_imf'];
    $acc_pin = $_POST['acc_pin'];

    $stmt = $connection->query("UPDATE users SET fname='$full_name', cot='$acct_cot', tax='$acct_tax', imf='$acct_imf', pin='$acc_pin' where id ='$id_user'");

    if(true){
        $msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						  Details Successfully Saved!
                   
			  		</div>
					";
    }
}


?>

<?php include 'headeradmin.php'; ?>


    <!---begin of Mobile View Here   only from Digital Forest Team-->

<?php include 'menu.php'; ?>

    <!---End of Mobile View Here   only from Digital Forest Team-->






    <div class="container-fluid mt--7">
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card shadow" >
                <div class="card-header border-0">
                    <h3 class="mb-0"><a href=""   class="btn btn-danger">Edit Account</a></h3>
                </div>

                <div class="card-body">
                    <div class="container-fluid">

                        <?php if(isset($msg)) echo $msg;  ?>

                        <?php

                        $stmt_users = "SELECT * FROM account where id='$id_user'";
                        $check = mysqli_query($connection, $stmt_users);
                        $user_fetch = $check->fetch_array(MYSQLI_ASSOC);


                        ?>


                        <form method='post'>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Full Name</label>
                                                <input id="name" name="full_name" value="<?=$user_fetch['fname']?>" class="form-control" type="text" required />

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="name">Balance</label>
                                                <input id="name" name="balance" class="form-control" type="text" value="<?=$user_fetch['a_bal']?>" readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                          <div class="row">
                              <div class="col-md-12">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="name">Username</label>
                                              <input id="name" name="username" value="<?=$user_fetch['uname']?>" class="form-control" type="text" readonly />

                                          </div>

                                      </div>

                                      <div class="col-md-6">

                                          <div class="form-group">
                                              <label for="name">Acc. No</label>
                                              <input id="name" name="acc_no" value="<?=$user_fetch['acc_no']?>" class="form-control" type="text" required readonly />
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Email</label>
                                                <input id="name" name="acct_email" class="form-control" type="email" value="<?=$user_fetch['email']?>" required  readonly/>

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="name">Gender</label>
                                                <input id="name" name="gender" class="form-control" type="text" value="<?=$user_fetch['sex']?>" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">COT</label>
                                                <input id="name" name="acct_cot" class="form-control" type="text" value="<?=$user_fetch['cot']?>" required />

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="name">TAX</label>
                                                <input id="name" name="acc_tax" class="form-control" type="text" value="<?=$user_fetch['tax']?>" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">IMF</label>
                                                <input id="name" name="acct_imf" class="form-control" type="text" value="<?=$user_fetch['imf']?>" required />

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="name">ACCT PIN</label>
                                                <input id="name" name="acc_pin" class="form-control" type="text" value="<?=$user_fetch['pin']?>" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <table>
                                <td colspan="2">
                                    <button type="submit" class="btn btn-primary" name="save_profile">
                                        <span class="glyphicon glyphicon-plus"></span> Save Profile
                                    </button>
                                    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to Main Menu</a>
                                </td>
                            </table>
                        </form>
                    </div>







                </div>
            </div>
        </div>
    </div>


<?php include 'foot.php'; ?>