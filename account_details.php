<?php 
require('top.php');
include_once('connection.inc.php');
    extract($_GET);
    $user_id=$_SESSION['id'];
    include_once('functions.inc.php');
	$name='';
	$address='';
	$pincode='';
	$city='';
	$mobile_number='';
	$already='';

	$sql="select * from account_details where user_id='$user_id'";
	$res=mysqli_query($con,$sql);
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$name=$row['name'];
		$address=$row['address'];
		$pincode=$row['pincode'];
		$city=$row['city'];
		$mobile_number=$row['mobile_number'];
		$already='1';
	}
	else
	{
		$already='0';
	}


	if(isset($_POST['submit'])){
		$name=get_safe_value($con,$_POST['name']);
		$address=get_safe_value($con,$_POST['address']);
		$pincode=get_safe_value($con,$_POST['pincode']);
		$city=get_safe_value($con,$_POST['city']);
		$mobile_number=get_safe_value($con,$_POST['mobile_number']);
		
		
		if($already=='1'){
			$update_sql="update account_details set name='$name',address='$address',pincode='$pincode',city='$city',mobile_number='$mobile_number' where user_id='$user_id'";
			mysqli_query($con,$update_sql);
		}else{
			$insert_sql="insert into account_details(user_id,name,address,pincode,city,mobile_number) values('$user_id','$name','$address','$pincode','$city','$mobile_number')";
			mysqli_query($con,$insert_sql);
			
			
		}
		
		die();
	}
?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
	<div class="ht__bradcaump__wrap">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bradcaump__inner">
						<nav class="bradcaump-inner">
							<a class="breadcrumb-item" href="index.html">Home</a>
							<span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
							<span class="breadcrumb-item active">Login</span>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
        <!-- End Bradcaump area -->
<div class="col-md-12">
	<div class="contact-form-wrap mt--60">
		<div class="col-xs-12">
			<div class="contact-title">
				<h2 class="title__line--6">Address</h2>
			</div>
		</div>
		<div class="col-xs-12">
			<form id="contact-form" method="post">
				<div class="single-contact-form">
					<label for="categories" class=" form-control-label">Name</label>
					<input type="text" name="name" placeholder="Enter name" class="form-control" required value="<?php echo $name?>">
				</div>
				
				<div class="single-contact-form">
					<label for="categories" class=" form-control-label">Address</label>
					<input type="text" name="address" placeholder="Enter Address" class="form-control" required value="<?php echo $address?>">
				</div>
				<div class="single-contact-form">
					<label for="categories" class=" form-control-label">City</label>
					<input type="text" name="city" placeholder="Enter City" class="form-control" required value="<?php echo $city?>">
				</div>
				<div class="single-contact-form">
					<label for="categories" class=" form-control-label">Pincode</label>
					<input type="text" name="pincode" placeholder="Enter Pincode" class="form-control" required value="<?php echo $pincode?>">
				</div>
				<div class="single-contact-form">
					<label for="categories" class=" form-control-label">Mobile</label>
					<input type="text" name="mobile_number" placeholder="Enter Mobile Number" class="form-control" required value="<?php echo $mobile_number?>">
				</div>
				
				<button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
			</form>
		</div>
	</div> 
</div>		
<?php 




require('footer.php')?>        