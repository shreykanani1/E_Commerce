<?php
    include_once('top.php');
    include_once('connection.inc.php');
    include_once('functions.inc.php');
    // $total=$_SESSION['total'];
    $user_id=$_SESSION['id'];
    
    if(isset($_GET['id'])){
        
        
        $product_id=mysqli_real_escape_string($con,$_GET['id']);
        
            $sql1="INSERT INTO cart (product_id,user_id) VALUES ('$product_id','$user_id')";
        $result1 = mysqli_query($con,$sql1);
        
        
        if($product_id>0){
            $get_product1=get_product($con,'','',$product_id);

            $sql = "SELECT * from product WHERE id='$product_id'";
            $result = mysqli_query($con,$sql);
            

        }?>
        <?php
    }
    $sql2="SELECT * from cart WHERE user_id='$user_id'";
        $result2 = mysqli_query($con,$sql2);
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
                                  <span class="breadcrumb-item active">shopping cart</span>
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
                                            <!-- <th class="product-quantity">Quantity</th> -->
                                            <!-- <th class="product-quantity">Total</th> -->
                                            <!-- <th class="product-subtotal">Total</th> -->
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
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
                                            
                                            
                                        </td>
                                            <!-- <td class="product-subtotal"></td > -->
                                            <td class="product-remove"><?php
                                            $product_id=$row['product_id'];
                                            $sql3="SELECT * from cart WHERE user_id='$user_id' and product_id='$product_id'";
                                            $result3 = mysqli_query($con,$sql3); 
                                            $row1=mysqli_fetch_assoc($result3);
                                            // if(isset($_SESSION['delete_msg']))
                                            // {
                                            //     echo ($_SESSION['delete_msg']);
                                            // }?><a href="con_delete_item_from_cart.php?id=<?php echo ($row['id']) ?>"><input type="button" value="Delete" class="btn btn-danger"></a></td>
                                        </tr>
                                        
                                        <?php
                                        }?>                                    
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                        <span><?php 
                                                $total=0;
                                                 $sql4="SELECT * from cart c,product p WHERE user_id='$user_id' and p.id=c.product_id";
                                                 $result4 = mysqli_query($con,$sql4); 
                                                 while($row4=mysqli_fetch_assoc($result4))
                                                 {
                                                     $total =$total+ $row4['price'];
                                                 }
                                                 
                                        ?>
                                        <h2 style="text-align:right">
                                        <?php echo("Total = ".$total);
                                        
                                        ?><h2>
                                        
                                        </span>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="index.php">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <!-- <a href="#">update</a> -->
                                            <a href="checkout.php?total=<?php
                                        echo $total?>">checkout</a>
                                        
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