<?php
    require("top.php");
    include_once('connection.inc.php');
    include_once('functions.inc.php');
    // $total=$_SESSION['total'];
    $user_id=$_SESSION['id'];

    ?>
    

<div class="body__overlay"></div>
        
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
                                  <span class="breadcrumb-item active">My Order</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">products</th>
                                            <th class="product-name">name of products</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-price">Order Status</th>
                                            <!-- <th class="product-quantity">Quantity</th> -->
                                            <!-- <th class="product-quantity">Total</th> -->
                                            <!-- <th class="product-subtotal">Total</th> -->
                                            <!-- <th class="product-remove">Remove</th> -->
                                        </tr>
                                    </thead>
                                    <tbody><?php
                                    $sql12="SELECT * from order_master WHERE user_id='$user_id'";
    $result12 = mysqli_query($con,$sql12);
    while($row12=mysqli_fetch_assoc($result12))
    {
        $order_id=$row12['order_id'];
        $order_status=$row12['order_status'];

        if(isset($_SESSION['USER_LOGIN']))
        {
            $sql2="SELECT * from order_details WHERE order_id='$order_id'";
            $result2 = mysqli_query($con,$sql2);
           
                                        while($row=mysqli_fetch_assoc($result2)) 
                                        { 
                                            $get_product=get_product($con,'','',$row['product_id']);
                                            
                                            ?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="admin/<?php echo $get_product['0']['image']?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?php echo $get_product['0']['name']?></a>
                                                <ul  class="pro__prize">
                                                    <li class="old__prize"><?php echo $get_product['0']['mrp']?></li>
                                                    <li><?php echo $get_product['0']['price']?></li>
                                                </ul>
                                            </td>
                                            <td class="product-price"><span class="amount"><?php echo $get_product['0']['price']?></span></td>
                                            <td class="product-price"><span class="amount"><?php echo $order_status?></span></td>
                                            
                                        </td>
                                            <!-- <td class="product-subtotal"></td > -->
                                            <!--  -->
                                        </tr>
                                        
                                        <?php
                                        }      
        }
        else
        {
        ?>
            <script>
                <?php $_SESSION['msg']="Login first to view the orders." ?>
                window.location.href='login.php';
                </script>
        <?php
        }
        
    }    ?>                      
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                        
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="index.php">Continue Shopping</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- End Banner Area -->



    
<?php require("footer.php"); ?>