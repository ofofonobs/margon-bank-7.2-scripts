<?php 
									
$type = $rows['type']; 
									
if($type == "Debit"){

echo "<span class='badge badge-danger'>$type</span>";
}
else{
    echo "<span class='badge badge-success'>$type</span>";
}
									
?>