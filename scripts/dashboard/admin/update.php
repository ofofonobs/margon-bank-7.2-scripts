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
              <h3 class="mb-0"><a href=""   class="btn btn-danger">UPDATE CUSTOMER ACCOUNT</a></h3>
            </div>
           
             
           <div class="card-body">
               
               
               
               
               
                                 <div class="col-md-5 align-self-center">
                        
                    </div>
                                <h3 class="card-subtitle">View and edit Users Details here.<b> To view Account Details only <a class="btn btn-warning"  href="view_account.php">Click Here</a></b> </h3>
                              <hr>
                                <div class="table-responsive m-t-40">
                                    <table id="example2" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                               	<th>Entry Id</th>
			<th>Acc.No</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Login Pin</th>
			<th>Transfer Pin</th>
			<th>Username</th>
			<th colspan="2" align="center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            	<?php
			$query = "SELECT * FROM account  WHERE verify ='Y'";       
			$records_per_page=100;
			$newquery = $crud->paging($query,$records_per_page);
			$crud->dataview($newquery);
		 ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>TOTAL CUSTOMERS:  <?php $crud->paginglink($query,$records_per_page); ?>
             
 
        
          </div>
        </div>
      </div>
     
     
     <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
    
    
       <?php include 'foot.php'; ?>