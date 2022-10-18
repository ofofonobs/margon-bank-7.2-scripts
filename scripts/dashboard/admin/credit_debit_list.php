<?php 
include_once 'class.crud.php';

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
              <h3 class="mb-0"><a href=""   class="btn btn-danger">ALL CUSTOMER DEBIT/CREDIT ALERT</a></h3>
            </div>
          
           <div class="card-body">
               
               
              
            
               
                <div class="table-responsive ">
                        <table class=" table-headertable table-bordered table-hover tile" >
                            <thead>
                                <tr class=" fixed_header">
                                    
                                   	<th>Entry Id</th>
		                         	<th>Account No</th>
									<th>Amount Transfered</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th colspan="2" align="center">Actions</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
<?php
			$query = "SELECT * FROM alerts  ";       
			$records_per_page=2000;
			$newquery = $crud->paging($query,$records_per_page);
			$crud->dataviewcr($newquery);
		 ?> 
                              
                                
                               
    
                            </tbody>
                        </table>
                    </div>
               
               
               <?php $crud->paginglink($query,$records_per_page); ?>
               
               
               
               
               
          </div>
        </div>
      </div>
     </div>
 
    
       <?php include 'foot.php'; ?>