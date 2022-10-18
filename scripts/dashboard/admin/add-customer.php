<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-save']))
{
	$email = $_POST['email'];
	$bank_name = $_POST['bank_name'];
	$acc_no = $_POST['acc_no'];
	$acc_name = $_POST['acc_name'];
	$amount = $_POST['amount'];
	$date = $_POST['date'];
	$status = $_POST['status'];
	$swift = $_POST['swift'];
	$type = $_POST['type'];
	$remarks = $_POST['remarks'];
	$routing = $_POST['routing'];

	
	
	if($crud->createt($email,$bank_name,$acc_no,$acc_name,$amount,$date,$status,$swift,$type,$remarks,$routing))
	{
		header("Location: add-transfer.php?inserted");
	}
	else
	{
		header("Location: add-transfer.php?failure");
	}
}
?>
<?php include_once 'layout/header.php'; ?>
<div class="clearfix"></div>

<?php
if(isset($_GET['inserted']))
{
	?>
    <div class="container-fluid">
	<div class="alert alert-info">
    Transfer Records added . <a href="index.php">HOME</a>!
	</div>
	</div>
    <?php
}
else if(isset($_GET['failure']))
{
	?>
    <div class="container-fluid">
	<div class="alert alert-danger" role="alert">Error</div>
	</div>
    <?php
}
?>

<div class="clearfix"></div><br />

<div class="container-fluid">

 	
	<form method='post'>
 
        <div class="form-group">
            <label for="name">Sender Email</label>
			<input id="name" name="email" class="form-control" type="text" required />
        </div>
		
		<div class="form-group">
            <label for="name">Reciever Bank</label>
			<input id="name" name="bank_name" class="form-control" type="text" required />
		
        </div>
		
		<div class="form-group">
            <label for="name">Reciever Acc. No</label>
			<input id="name" name="acc_no" class="form-control" type="text" required />
        </div>
        
        	<div class="form-group">
            <label for="name"> Acc. Name</label>
			<input id="name" name="acc_name" class="form-control" type="text" required />
        </div>
 
        <div class="form-group">
			<label for="acc_no">Amount</label>
			<input id="email" name="amount" class="form-control" type="text" required />
        </div>
 
        <div class="form-group">
            <label for="website">Date</label>
			<input id="website" name="date" class="form-control" type="text" required />
        </div>
 
        <div class="form-group">
			<label for="contact">Transfer Status <small>(Successful,Pending,Failed)</small></label>
			<input id="contact" name="status" class="form-control" type="text" required />
        </div>
        
        <div class="form-group">
			<label for="job">SWIFT CODE</label>
			<input id="job" name="swift" class="form-control" type="text" required />
        </div>
		
		<div class="form-group">
			<label for="job">Sender Account Type</label>
			<input id="job" name="type" class="form-control" type="text" required />
        </div>
		
		<div class="form-group">
			<label for="company">Desc</label>
			<input id="company" name="remarks" class="form-control" type="text" required />
        </div>
		
		 <div class="form-group">
            <label for="name">Rounting Code</label>
			<input id="name" name="routing" class="form-control" type="text" required />
        </div>
 
        
 
        <table>
            <td colspan="2">
            <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Create New Customer
			</button>  
            <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to Admin index</a>
            </td>
        </table>
</form>
</div>
<?php include_once 'layout/footer.php'; ?>
