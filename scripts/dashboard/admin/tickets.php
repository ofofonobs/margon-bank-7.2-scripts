<?php
session_start();
require_once 'class.admin.php';

include_once ('session.php');
if(!isset($_SESSION['email'])){

    header("Location: login.php");

    exit();
}
$user_home = new USER();


$stmt = $user_home->runQuery("SELECT * FROM ticket ORDER BY id DESC LIMIT 200");
$stmt->execute();



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
                    <h3 class="mb-0"><a href=""   class="btn btn-danger">Tickets</a></h3>
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                                <div class="block-area" id="tableHover">
                                    <h3 class="block-title">View All Opened Tickets</h3>
                                    <?php
                                    if(isset($_GET['success']))
                                    {
                                        ?>
                                        <div class='alert alert-info'>
                                            <button class='close' data-dismiss='alert'>&times;</button>
                                            <strong>Record Deleted Successfully</strong>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if(isset($_GET['error']))
                                    {
                                        ?>
                                        <div class='alert alert-danger'>
                                            <button class='close' data-dismiss='alert'>&times;</button>
                                            <strong>Unable to Delete Record</strong>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div class="table-responsive overflow">
                                        <table class="table table-bordered table-hover tile">
                                            <thead>

                                            <tr>
                                                <th><b>Ticket Number</b></th>
                                                <th><b>Sender</b></th>
                                                <th><b>Subject</b></th>
                                                <th><b>Message</b></th>
                                                <th><b>Date Opened</b></th>
                                                <th><b>Reply</b></th>
                                                <th><b>Delete Ticket</b></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                                                <tr>
                                                    <td><?php echo $row['tc']; ?></td>
                                                    <td><?php echo $row['sender_name']; ?></td>
                                                    <td><?php echo $row['subject']; ?></td>
                                                    <td><?php echo $row['msg']; ?></td>
                                                    <td><?php echo $row['date']; ?></td>
                                                    <td> <a href="messages.php"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-inbox"></i>REPLY</button></a></td>
                                                    <td><a href="dec.php?id=<?php echo $row['id']; ?>" title="Delete Ticket" rel="tooltip" class="btn btn-simple btn-info btn-icon "><i class="fa fa-ban"></i></a></td>

                                                </tr>

                                            <?php }?>                    </tbody>
                                        </table>
                                    </div>
                                </div>

                        </div>







                </div>
            </div>
        </div>
    </div>


<?php include 'foot.php'; ?>