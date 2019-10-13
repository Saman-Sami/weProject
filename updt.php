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
          // echo "Connected" ;
        if(isset($_REQUEST['updtBtn'])){
            $prod_name=$_REQUEST['prod_name'];
            $designNo=$_REQUEST['designNo'];
            $sql="SELECT * FROM product WHERE designNo='$designNo'";
            $query=mysqli_query($conn,$sql);
            $row=mysqli_num_rows($query);
           // echo $row;
            if($row>1){
                echo "design No. clash";
            }else{
                $data=mysqli_fetch_assoc($query);
                   /* while(mysqli_fetch_assoc($query)){
                        $prod_desc=$data["prod_desc"];
                        $quantity=$data["quantity"];
                        //echo "$prod_desc"; */
            if(isset($data['prod_name'])){ $prod_name=$data['prod_name'];}            
            if(isset($data['prod_desc'])){ $prod_desc=$data['prod_desc'];}    
            if(isset($data['quantity'])){ $quantity=$data['quantity'];}   
            if(isset($data['sellPr'])){ $sellPr=$data['sellPr'];} 
            if(isset($data['costPr'])){ $costPr=$data['costPr'];}
            if(isset($data['prod_img'])){ $prod_img=$data['prod_img'];}
            if(isset($data['prod_id'])){ $id=$data['prod_id'];} 
            // echo $id;
                
            }
        }
            if(isset($_REQUEST['prdupdt'])){
                if(($_REQUEST['prod_desc']=="") || ($_REQUEST['designNo']=="") || ($_REQUEST['quantity']=="") || ($_REQUEST['sellPr']=="") || ($_REQUEST['costPr']=="")){
                    echo "<small>Please fill all fields</small>";
                }else{
                    $id=$_REQUEST['prdid'];
                    // $prod_name=$_REQUEST['prdnm'];
                    $prod_desc=$_REQUEST['prod_desc'];
                    $designNo=$_REQUEST['designNo'];
                    $quantity=$_REQUEST['quantity'];
                    $sellPr=$_REQUEST['sellPr'];
                    $costPr=$_REQUEST['costPr'];
                    // $prod_img=$_REQUEST['prod_img'];
                    
                    $sql="UPDATE product SET prod_desc='$prod_desc', designNo='$designNo', quantity='$quantity', sellPr='$sellPr', costPr='$costPr' WHERE prod_id='$id'";
                    $res=mysqli_query($conn,$sql);
                    if($res){
                        echo "You updated $prod_name";
                    }else{
                        echo "Unable to update";
                    }
                }
            }
          //  $_FILES['file']['name'];
          //  $prod_img_name=$_REQUEST['prod_img']['name'];
          //$prod_img_name=$_FILES['prod_img']['name'];
         // $prod_img=$_FILES['prod_img']['name'];
         //   $tmp_name=$_FILES['prod_img']['tmp_name'];
         //   $extnsn=substr($prod_img_name,strpos($prod_img_name,'.')+1);
         // $location="images/";
        //   $filePath=$location.$prod_img_name.$extnsn;
          //$filePath="$location"."$prod_img";
        //   $extnsn=substr($prod_img_name,strpos($prod_img_name,'.')+1);
         // $ex=pre_r($extnsn);
         // echo "$prod_img_name";
         // echo "$filePath";
         // echo "$extnsn";
         // echo "$ex";
         // echo "prod_img";
            
             
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" href="adm.css" rel="stylesheet">
    <title>Update</title>
</head>
<body>
    <fieldset id="Updt" class="fs" >
    <br><br>  
    <legend class="lgnd">Update product information</legend>
    <form action="" >
    <!-- <label for="prdname"> Choose Product: </label> <select name="prod_name" id="drpdwn" placeholder="Category">
    <option value="Bedroom" id="bd"  > Bedroom </option>
    <option value="Lounge"  id="lg" > Lounge </option>
    <option value="Dining"  id="dg" > Dining </option>
    <option value="School"  id="sc" > School </option>
    <option value="Office"  id="of" > Office </option>
    </select> -->
    <label class="lbl" for="prdc"> Product Description: </label> <input type="textarea" name="prod_desc" id="prdc"  value="<?php echo $prod_desc; ?>" style="width:200px; height:50px;">
    <br><br>
    <label class="lbl" for="dsgn"> Design No: </label> <input type="text" name="designNo" id="dsgn" value="<?php echo $designNo; ?>">
    <br><br>
    <label class="lbl" for="qnt"> Quantity: </label> <input type="text" name="quantity" id="qnt" value="<?php echo $quantity; ?>"> 
    <br><br>
    <label class="lbl" for="sp"> Sell Price: </label> <input type="text" name="sellPr" id="sp"  value="<?php echo $sellPr; ?>">
    <br><br>
    <label class="lbl" for="cp"> Cost Price: </label> <input type="text" name="costPr" id="cp"  value="<?php echo $costPr; ?>">
    <br><br>
    <!-- <label for="primg"> Product Image: </label> <img src="<?php /*echo $prod_img;*/ ?>" alt="Oops! Unavailable"> -->
    <input type="hidden" name="prdid" value="<?php echo $id; ?>">
    <input type="hidden" name="prdnm" value="<?php echo $prod_name; ?>">
    <input type="submit" name="prdupdt" class="btn" value="Update" >
    </form>
    </fieldset>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>
