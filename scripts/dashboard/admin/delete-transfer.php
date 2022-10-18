<?php 
include_once 'class.crud.php';
if(isset($_POST['btn-del']))
{
	$id = $_GET['delete_id'];
	$crud->deletet($id);
	header("Location: delete-transfer.php?deleted");	
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
              <h3 class="mb-0"><a href=""   class="btn btn-danger">DELETE CUSTOMER TRANSACTION</a></h3>
            </div>
          
           <div class="card-body">
               
               
               
               
              
               <div class="container-fluid">

	<?php
	if(isset($_GET['deleted']))
	{
		?>
        <div class="alert alert-success">
    	<strong>Success!</strong> User Transfer Records was deleted... 
		</div>
        <?php
	}
	else
	{
		?>
        <div class="alert alert-danger">
    	<strong>Sure !</strong> to remove the following User Transfer record ? 
		</div>
        <?php
	}
?>
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
</p>
</div>	
               
               
               
               
               
               
          </div>
        </div>
      </div>
     </div>
 
    
       <?php include 'foot.php'; ?>