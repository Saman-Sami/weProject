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
      // echo"Connected";
      if (isset($_REQUEST['addtocrt'])){
        //print_r($_REQUEST['pid']);
        if(isset($_SESSION['name'])){
        if(isset($_SESSION['cart'])){
            $item_array_id = array_column($_SESSION['cart'], "prod_id");
            

            if(in_array($_REQUEST['pid'], $item_array_id)){
               echo "<script>alert('Product is already added in the cart..!')</script>";
               echo "<script>window.location = 'dining.php'</script>";
            
        }else{
            $count = count($_SESSION['cart']);   // Returns no. of elements in array
            $item_array = array(
                'prod_id' => $_REQUEST['pid']
            );
            $_SESSION['cart'][$count] = $item_array;
            // print_r($_SESSION['cart']);

        }
             
        }else{
            $item_array = array(
                'prod_id' => $_REQUEST['pid']
            );
            $_SESSION['cart'][0]=$item_array;
            // print_r($_SESSION['cart']);
        }
    }else{ echo "<script>alert('You have to login first..!')</script>";
        echo "<script>window.location = 'sign_in.php'</script>";}
    }   
    
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" href="catg.css" rel="stylesheet">
    <title>Dining</title>
</head>
<body>
<?php require_once('navbar.php')?>
<div class="wrap">
<div class="cardleft" >

<?php $sql="SELECT * FROM product WHERE prod_name='Dining'";
      $query=mysqli_query($conn,$sql);  
      while($data=mysqli_fetch_assoc($query))
      {
?>
<form action="dining.php">
<img src="<?php echo $data['prod_img']; ?>" alt="BedSet" style="width:100%">
<h1><?php echo $data['prod_name']; ?></h1>
<p class="price">Rs.<?php echo $data['sellPr']; ?></p>
<p style="font-size:20px;"><?php echo $data['prod_desc']; ?></p>

<input type="hidden" name="pid" value="<?php echo $data['prod_id']; ?>">
<p><button type="submit" name="addtocrt">Add to Cart</button></p> 
<?php 
      $prod_id=$data['prod_id'];
      $sq="SELECT * FROM product WHERE prod_id='$prod_id'";
      $quer=mysqli_query($conn,$sq);  
      while($dat=mysqli_fetch_assoc($quer))
      {
        $prod_img=$data['prod_img'];
        $prod_name=$data['prod_name'];
        $sellPr=$data['sellPr'];
      }
?>
</form>
<?php }  ?>
</div>
      
</div>
<?php
include_once('footer.php');
mysqli_close($conn);
}
?>

</body>
</html>
