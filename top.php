<?php
require('connection.inc.php');
require('functions.inc.php');

$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}
$user_id=$_SESSION['id'];
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ecom Website</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <style>  
.dropbtn {  
    background-color:  #c43b68;  
    color: white;  
    padding: 10px;  
    font-size: 12px;  
}  
.dropdown {  
    display: inline-block;  
    position: relative  
}  
.dropdown-content {  
    position: absolute;  
    background-color: white;  
    min-width: 200px;  
    display: none;  
    z-index: 1;  
}  
.dropdown-content a {  
    color: black;  
    padding: 12px 16px;  
    text-decoration: none;  
    display: block;  
}  
.dropdown-content a:hover {  
    background-color: #c43b68;  
}  
.dropdown:hover .dropdown-content {  
    display: block;  
}  
.dropdown:hover .dropbtn {  
    background-color: grey;  
}  
</style>  
</head>
<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <header id="htc__header" class="htc__header__area header--one">
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.php"><img src="images/logo/4.png" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3" >
                                <nav class="main__menu__nav hidden-xs hidden-sm" >
                                    <ul class="main__menu">
                                        
                                        <li class="drop"><a href="index.php">Home</a></li>
                                        <div class="dropdown">  
                                <button class="dropbtn"> Catagories</button>  
                                <div class="dropdown-content">  
                                <?php
                                    foreach($cat_arr as $list){
                                        ?>
                                        <a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a>
                                        <?php
                                    }
                                    ?>
                                </div>  
                            </div>     
                                        <li><a href="contact.php">contact</a></li>
                                    </ul>
                                </nav>
                                
                                
                                    
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div class="header__account">
                                        <?php 
                                        if(!isset($_SESSION['USER_LOGIN']))
                                        {?>
                                            <a href="login.php">Login/Register</a><?php
                                        } 
                                        else
                                        {?>
                                            <a href="logout.php">Logout</a><?php
                                        }
                                        ?>
                                    </div>
                                    <div class="htc__shopping__cart">
                                        <a href="add_to_cart.php"><i class="icon-handbag icons"></i></a>
                                        <a href="add_to_cart.php"><span class="htc__qua"><?php 
                                                $sql2="SELECT * from cart WHERE user_id='$user_id'";
                                                $result2 = mysqli_query($con,$sql2);
                                                $count=0;
                                                while($row=mysqli_fetch_assoc($result2))
                                                {
                                                    $count=$count+1;
                                                }
                                                echo $count;
                                        ?></span></a>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="menumenu__container clearfix" >
                            <div class="col-md-12">
                             
                            



                            
                            
                        </div>
                    </div>
                                    
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
        </header>