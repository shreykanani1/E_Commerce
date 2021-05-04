<?php //SK

extract($_POST);

    include_once('connection.inc.php');
    $user_id=$_SESSION['id'];
    $total=0;


    $sql4="SELECT * from cart c,product p WHERE user_id='$user_id' and p.id=c.product_id";
    $result4 = mysqli_query($con,$sql4); 
    while($row4=mysqli_fetch_assoc($result4))
    {
        $total =$total+ $row4['price'];
    }


    $sql = "SELECT id,product_id from cart where user_id='$user_id'";
    $result= mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $id=$row['id'];
    $product_id=$row['product_id'];
    $sql1 = "INSERT INTO order_master (id, order_id, user_id, product_id, address, city, pincode, mobilenumber, payment_method, total, payment_status, order_status, added_on) VALUES (NULL,'$id' , '$user_id','$product_id', '$address', '$city', '$pincode','$mobilenumber', '$paymentmethod', '$total', '0', 'Ordered', NOW())";
    $result1= mysqli_query($con,$sql1);
    echo "$sql1";

    
    
    $sql44="SELECT * from cart c,product p WHERE user_id='$user_id' and p.id=c.product_id";
    echo "$sql44";
    $result44 = mysqli_query($con,$sql44); 
    
    $sql5="SELECT order_id FROM order_master where user_id='$user_id' order by id desc";
    $result5 = mysqli_query($con,$sql5); 
    $row5=mysqli_fetch_assoc($result5);
    $id=$row5['order_id'];
    while($row44=mysqli_fetch_assoc($result44))
    {
        
        
        $product_id=$row44['product_id'];
        $price=$row44['price'];
        $total =$total+ $row44['price'];



        $sql2 = "INSERT INTO order_details (id, order_id, product_id, price) VALUES (NULL,'$id' , '$product_id', '$price')";
        echo "$sql2";
        $result2= mysqli_query($con,$sql2);
        if($result2>0)
        {
            $sql_product="select * from product where id='$product_id'";
            echo "$sql_product";
            $result_product=mysqli_query($con,$sql_product);
            $row_product=mysqli_fetch_assoc($result_product);
            $qty=$row_product['qty'];
            $qty=$qty-1;
            $sql_qty="UPDATE product SET qty = '$qty' WHERE id='$product_id'";
            $result_qty=mysqli_query($con,$sql_qty);
            echo "$sql_qty";
        }
    }
                                                 
                                        


    
    if ($result1>0) 
    {
        $_SESSION['msg']="Order placed";
        header("Location: order_placed.php");
        die();
    } 
    else 
    {
        
            $_SESSION['msg'] = "Something went wrong.";
            header("Location: login.php");
        
    }
    
        
    
?>