<?php
require("top.php");
include_once('connection.inc.php');
    extract($_GET);
    $user_id=$_SESSION['id'];
    include_once('functions.inc.php');
if(isset($_SESSION['USER_LOGIN']))
{
    $sql2="SELECT * from cart WHERE user_id='$user_id'";
        $result2 = mysqli_query($con,$sql2);
}
else
{
    ?>
        <script>
    		<?php $_SESSION['msg']="Login first." ?>
	        window.location.href='login.php';
	        </script>
    <?php
}
        // $sql3="SELECT * from order_master,users WHERE user_id='$user_id'";
        $sql3="SELECT * from account_details WHERE user_id='$user_id'";
        $result3 = mysqli_query($con,$sql3);
        $row3=mysqli_fetch_assoc($result3);
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">

        <!-- End Header Area -->
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            
        </div>
        <!-- End Offset Wrapper -->
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
                                  <span class="breadcrumb-item active">checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                    
                                    <div class="accordion__title">
                                        Address Information
                                    </div>
                                    <div class="accordion__body">
                                        <div class="bilinfo">
                                            <form action='con_checkout.php?total=<?php 
                                        echo $total?>' method="post">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" name="name" placeholder="Name" value="<?php if($row3>0) {echo ($row3['name']);} ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" name="address" placeholder="Address" value="<?php if($row3>0) {echo ($row3['address']);} ?>">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="city" placeholder="City" value="<?php if($row3>0) {echo ($row3['city']);} ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="pincode" placeholder="Pincode" value="<?php if($row3>0) {echo ($row3['pincode']);} ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" name="mobilenumber" placeholder="Mobile Number" value="<?php if($row3>0) {echo ($row3['mobile_number']);} ?>">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <br>
                                        <input type="radio" value="cod" name="paymentmethod"> Cash on Delivery</div>
                                                </div>
                                                <br>
                                                
                                                
                                                <div class="buttons-cart checkout--btn">
                                                <input type="submit" name="placeorder" value="Placeoder"></div>
                                            </form>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-details">
                            <h5 class="order-details__title">Your Order</h5>
                            <div class="order-details__item"><?php
                                while($row=mysqli_fetch_assoc($result2)) 
                                { 
                                    $get_product=get_product($con,'','',$row['product_id']);
                                            
                                ?>
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="admin/<?php echo $get_product['0']['image']?>" alt="ordered item">
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#"><?php echo $get_product['0']['name']?></a>
                                        <span class="price"><?php echo $get_product['0']['price']?></span>
                                    </div>
                                </div><?php
                                }?>
                           
                            <div class="ordre-details__total">
                                <h5>Order total</h5>
                                <span class="price"><?php echo $total?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>

</body>

</html>
    
<?php require("footer.php"); ?>