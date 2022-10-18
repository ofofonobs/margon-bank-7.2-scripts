<?php
include_once 'class.crud.php';
if(isset($_POST['btn-update']))
{
	$id = $_GET['edit_id'];
	$uname = $_POST['uname'];
	$amount = $_POST['amount'];
	$remarks = $_POST['remarks'];
	$type = $_POST['type'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$statz = $_POST['statz'];
	
	
	if($crud->updatecr($id,$uname,$amount,$remarks,$type,$date,$time,$statz))
	{
		$msg = "<div class='alert alert-info'>
				Account Record was updated successfully <a href='index.php'>HOME</a>!
				</div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				<strong>SORRY!</strong> ERROR while updating record !
				</div>";
	}
}

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getIDcr($id));	
}

?>



 <?php include 'headeradmin.php'; ?>
 

 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'menu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
 
      <script type="text/javascript" src="paginator.js"></script>
        <script type="text/javascript" src="table.js"></script>
     
     
  
    <div class="container-fluid mt--7">
     <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow" >
            <div class="card-header border-0">
              <h3 class="mb-0"><a href=""   class="btn btn-danger">UPDATE ALERT</a></h3>
            </div>
          
           <div class="card-body">
               
                                    <?php
if(isset($msg))
{
	echo $msg;
}
?>
              
            <div class="container-fluid">
	<form method='post' class=''>
	    
	    
 <div class="row" >
         <div class="form-group col-md-3">
            <label for="name">Account Num</label>
			<input id="name" name="uname" class="form-control" type="text" value="<?php echo $uname;?>"  />
        </div>
		
        <div class="form-group col-md-3">
            <label for="name">Amount</label>
			<input id="name" name="amount" class="form-control" type="text" value="<?php echo $amount;?>"  />
        </div>
 
        <div class="form-group col-md-3">
			<label for="type">Decriptions</label>
			<input id="remarks" name="remarks" class="form-control" type="text" value="<?php echo $remarks;?>" />
        </div>
 </div>
 	    
 <div class="row" >
        <div class="form-group col-md-3">
             <label for="name">Transaction Type</label> = <b><?php echo $type;?></b>
		  <select name="type" class="form-control input-sm validate[required]">
                                    <option value="Debit">Debit</option>
                                <option value="Credit">Credit</option>
                                 
                                 </select>
            
        </div>
        
         <div class="form-group col-md-3">
             <label for="name">Transaction Type</label> = <b><?php echo $statz;?></b>
		  <select name="statz" class="form-control input-sm validate[required]">
                                    <option value="Successful">Successful</option>
                                <option value="Pending">Pending</option>
                                <option value="Failed">Failed</option>
                                <option value="On-Hold">On-Hold</option>
                                 <option value="Cancelled">Cancelled</option>
                                 
                                 </select>
            
        </div>
 
 
        <div class="form-group col-md-3">
			<label for="contact">Transaction Date </label>
			<input id="contact" name="date" class="form-control" type="text" value="<?php echo $date;?>" required />
        </div>
		
		<div class="form-group col-md-3">
			<label for="job">Transfer Time</label>
			<input id="job" name="time" class="form-control" type="text" value="<?php echo $time;?>" required />
        </div>
		
	</div>
 
            <br />
        <table>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Update Alert
				</button>
                <a href="credit_debit_list.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back</a>
            </td>
        </tr>
        </table>
</form> 


</div>





               
               
               
               
               
               
               
               
               
               
          </div>
        </div>
      </div>
     </div>
 
    
       <?php include 'foot.php'; ?>