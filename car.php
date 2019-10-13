<?php
   session_start();

   $db_host="localhost";
   $db_user="root";
   $db_password="";
   $db_name="project_db";

   $conn=mysqli_connect($db_host,$db_user,$db_password,$db_name);
   if(!$conn){
    echo"Not Connected";
   }else{
    //echo"Connected";
    if (isset($_POST['remove'])){
        print_r($_GET['id']);
        if ($_GET['action'] == 'remove'){
            foreach ($_SESSION['cart'] as $key => $value){
                if($value["prod_id"] == $_GET['id']){
                    unset($_SESSION['cart'][$key]);
                    echo "<script>alert('Product has been Removed...!')</script>";
                    echo "<script>window.location = 'car.php'</script>";

                }
            }

        }
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link type="text/css" href="cart.css" rel="stylesheet">
</head>
<body style="background-color:white;">
<?php 
    require_once('navbar.php'); 
   // require_once('comp.php');
   function cartElement($prod_img, $prod_name, $sellPr, $prod_id){
    $element = "
    <div class=\"product\">
    <form action=\"car.php?action=remove&id=$prod_id\" method=\"post\">
    <div class=\"product-image\"><img src=$prod_img alt=\"Image1\"></div>
    <div class=\"product-details\"><div class=\"product-title\">$prod_name</div></div>
        <div class=\"product-price\"> Rs.$sellPr</div> 
        <div class=\"product-removal\"><button type=\"submit\" class=\"remove-product\" name=\"remove\">Remove</button></div>   
        </form>
    </div>
    ";
    echo  $element;}
?>
<div class="shopping-cart">
<h1>My Cart</h1>
<?php
    $total = 0;
    if (isset($_SESSION['cart'])){
        $prod_id = array_column($_SESSION['cart'], "prod_id");
        // print_r($prod_id);
            foreach ($prod_id as $pid){
                $sql="SELECT * FROM product WHERE prod_id='$pid'";
                $result=mysqli_query($conn,$sql);
           //     print_r($result);
                // echo"<br>";
                while ($row =mysqli_fetch_assoc($result)){
                    // echo"<br/>";
                    $prod_img= $row['prod_img'];
                    $prod_name=$row['prod_name'];
                    $sellPr=$row['sellPr'];
                    $prod_id=$row['prod_id'];
                    // echo "$prod_name "."$sellPr"."$prod_id";
                 cartElement($prod_img, $prod_name ,$sellPr, $prod_id);
                 $total = $total + $sellPr;                
               }  
           }                 
    }else{
        echo "<h5 class=\"product-details\">Cart is Empty</h5>";
    }          
?>
<h6 style="text-align:center;font-size:22px;margin-bottom:0px;margin-top:0px;">PRICE DETAILS</h6>
<?php
        if (isset($_SESSION['cart'])){
            $count  = count($_SESSION['cart']);
            echo "<form action='' style=\"text-align:center;\">";
            // echo"<center>";
            echo "<div class=\"totals\"><h6 style=\"text-align:center;font-size:18px;margin-bottom:0px;margin-top:0px;\">Price ($count items)</h6>";
        }else{
            echo "<h6 style=\"text-align:center;font-size:18px;margin-bottom:0px;margin-top:0px;\>Price (0 items)</h6>";
        }
        echo "<div class=\"totals-item\"><label>Amount Payable</label>";
        echo "<div class=\"totals-value\">Rs. $total </div></div>";
        echo"<input type=\"hidden\"  name=\"count\" value=\"$count\">";
        echo"<input type=\"hidden\"  class=\"product-price\" name=\"tolPr\" value=\"$total\">";
        // echo"<input type=\"hidden\"  name=\"prodId\" value=\"$prod_id\">";
        if(isset($_REQUEST['chk'])){
            $email= $_SESSION['email'];
            $sql="SELECT cust_id FROM customer WHERE email='$email'";
            $query=mysqli_query($conn,$sql);
            // print_r($query);
            $data=mysqli_fetch_assoc($query);
            $custId=$data['cust_id'];
            // echo"$custId";
            $insrCrt="INSERT INTO cart(no_of_prods,tolPr,cart_date,cust_id) VALUES('$count','$total',CURDATE(),'$custId')";
            $result=mysqli_query($conn,$insrCrt);
            if($result){
             echo "<script>alert('A record is inserted into cart..!')</script>";
            }else{
             echo "<script>alert('Unable to Insert..!')</script>";
            }
            $sq="SELECT cart_id FROM cart WHERE cust_id='$custId' AND cart_date=CURDATE()";
            $quer=mysqli_query($conn,$sq);
            $dat=mysqli_fetch_assoc($quer);
            $cartId=$dat['cart_id'];
            $prodId=array_column($_SESSION['cart'], "prod_id");
            foreach ($prodId as $key => $pid){
            echo "$key => $pid<br/>";
            $insrBill="INSERT INTO bill_info(bill_date,prod_id,cust_id,cart_id) VALUES(CURDATE(),$pid,$custId,$cartId)";
            $res=mysqli_query($conn,$insrBill);
            if($res){
            echo "<script>alert('A record is inserted into bill..!')</script>";
            }else{
            echo "<script>alert('Unable to Insert..!')</script>";
            }
        
            // echo"<input type=\"hidden\"  name=\"$key\" value=\"$pid\">";
        }
    }
        // echo"<input type=\"hidden\"  name=\"PrArr\" value=\"print_r($prodId)\">";
        echo"<input type=\"submit\" name=\"chk\" class=\"checkout\" value=\"Checkout\">";
        echo"</form></div></div>";
?>
<?php
include_once('footer.php');
}
mysqli_close($conn);
?>
</body>
</html>