<?php
include_once 'class.crud.php';

if(isset($_POST['btn-del']))
{
	$id = $_GET['delete_id'];
	$crud->deletecr($id);
	header("Location: dcr.php?deleted");	
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
              <h3 class="mb-0"><a href=""   class="btn btn-danger">DELETE CUSTOMER ALERT</a></h3>
            </div>
          
           <div class="card-body">
               
                                

               <?php
	if(isset($_GET['deleted']))
	{
		?>
        <div class="alert alert-success">
    	<strong>Success!</strong> User Alert was deleted... 
		</div>
        <?php
	}
	else
	{
		?>
        <div class="alert alert-danger">
    	<strong>Sure !</strong> to remove the following User record ? 
		</div>
        <?php
	}
	?>	
</div>

<div class="clearfix"></div>

<div class="container-fluid">
 	
	 <?php
	 if(isset($_GET['delete_id']))
	 {
		 ?>
         <table class='table table-bordered'>
         <tr>
			<th>Entry Id</th>
		                         	<th>Account No</th>
									<th>Amount Transfered</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Time</th>
         </tr>
         <?php
         $stmt = $DB_con->prepare("SELECT * FROM alerts WHERE id=:id");
         $stmt->execute(array(":id"=>$_GET['delete_id']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
				 <td><?php print($row['id']); ?></td>
				<td><?php print($row['uname']); ?></td>
                <td><?php print($row['amount']); ?></td>
                
                <td><?php print($row['remarks']); ?></td>
                <td><?php print($row['type']); ?></td>
                <td><?php print($row['date']); ?></td>
                <td><?php print($row['time']); ?></td>
                
             </tr>
             <?php
         }
         ?>
         </table>
         <?php
	 }
	 ?>
</div>

<div class="container-fluid">
<p>
<?php
if(isset($_GET['delete_id']))
{
	?>
  	<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
    </form>  
	<?php
}
else
{
	?>
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
    <?php
}
?>
               
               
         <br/>      
               
               
               
               
               
               
          </div>
        </div>
      </div>
     </div>
 
    
       <?php include 'foot.php'; ?>