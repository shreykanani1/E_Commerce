<?php
require('top.inc.php');
include_once('CommonFunctions.php');
$id='';
$order_id='';
$user_id='';
$order_status='';

$msg='';

if(isset($_GET['id']) && $_GET['id']!=''){
	
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from order_master where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$id=$row['id'];
		$order_id=$row['order_id'];
		$user_id=$row['user_id'];
		$order_status=$row['order_status'];
	}else{
		header('location:order_master.php');
		die();
	}
}

if(isset($_POST['submit'])){
	
	$order_status=get_safe_value($con,$_POST['order_status']);
	$res=mysqli_query($con,"select * from order_master where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}
	
	if(isset($_GET['id']) && $_GET['id']!=''){
			$update_sql="UPDATE order_master SET order_status = '$order_status' WHERE id = '$id'";
		mysqli_query($con,$update_sql);
		
	header('location:order_master.php');
	die();
	}
}
	
	

?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <form method="post" >
							<div class="card-body card-block">
							   
								<div class="form-group">
									<label for="categories" class=" form-control-label">Status</label>
									<select class="form-control" name="order_status">
										<option>Select Status</option>
										<option value="Ordered">Ordered</option>
										<option value="Packed">Packed</option>
										<option value="Shipped">Shipped</option>
										<option value="Delivered">Delivered</option>
										<option value="Cancelled">Cancelled</option>
									</select>
								</div>
								
					
								
								
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');

?>