<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$order_status='1';
		}else{
			$order_status='0';
		}
		$update_status_sql="update order_master set order_status='$order_status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from order_master where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from order_master order by id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Orders </h4>
				   
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
                               <th>ID</th>
							   <th>Order ID</th>
							   <th>User ID</th>
							   <th>Address</th>
							   <th>City</th>
							   <th>Pincode</th>
							   <th>order_status</th>
							   <th>Payment Method</th>
							   <th>Total</th>
							   
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
                               <td class="serial"><?php echo $i;
                               $i=$i+1;?></td>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['order_id']?></td>
							   <td><?php echo $row['user_id']?></td>
							   <td><?php echo $row['address']?></td>
							   <td><?php echo $row['city']?></td>
							   <td><?php echo $row['pincode']?></td>
							   <td><?php echo $row['order_status']?></td>
							   <td><?php echo $row['payment_method']?></td>
                               <td><?php echo $row['total']?></td>
							   <td> 
								<?php
								
								echo "<span class='badge badge-edit'><a href='manage_order.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');

?>