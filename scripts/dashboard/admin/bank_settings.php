
<?php
include_once 'class.crud.php';
if(isset($_POST['btn-update']))
{
	$id = $_GET['edit_id'];
	$name = $_POST['name']; 
	
	if($crud->update($id,$name))
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
	extract($crud->getID($id));	
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
              <h3 class="mb-0"><a href=""   class="btn btn-danger">SITE SETTINGS</a></h3>
            </div>
          
           <div class="card-body">
               
             
               
              
<div class="container-fluid">
	<form method='post' class=''>
 
  
             
 <div class="row">
         <div class="form-group col-md-3">
            <label for="name">Bank Name</label>
			<input id="name" name="name" class="form-control" type="text" value="<?php echo $name;?>"  />
        </div>
		
        <div class="form-group col-md-3">
            <label for="name">First Name</label>
			<input id="name" name="" class="form-control" type="text" value="<?php echo $fname;?>"  />
        </div>
 
        <div class="form-group col-md-3">
			<label for="email">Last Name</label>
			<input id="lname" name="" class="form-control" type="text" value="<?php echo $lname;?>" />
        </div>
 
        <div class="form-group col-md-3">
            <label for="website">Email</label>
			<input id="website" name="" class="form-control" type="text" value="<?php echo $email;?>" />
        </div>
 </div>
 
 
  
  
		<div class="clearfix"></div>
            <br />
        <table>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Update Customer
				</button>
                <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
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