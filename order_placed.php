

<?php
require("top.php");
include_once('connection.inc.php');
include_once('functions.inc.php');
// $total=$_SESSION['total'];
$user_id=$_SESSION['id'];

if(isset($_SESSION['USER_LOGIN']))
{
    $sql = "SELECT * from cart where user_id='$user_id'";

    $result= mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
        $id=$row['id'];
        $sql1 = "DELETE from cart WHERE id=$id";

        $result1 = mysqli_query($con,$sql1);
    }
    
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
?>

<div class="body__overlay"></div>
     
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
        <h1 style="text-align:center"><?php echo($_SESSION['msg'])?></h1>
        <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- End Banner Area -->
<?php require("footer.php"); ?>

?>