<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" href="adm.css" rel="stylesheet">
    <title>Admin Space</title>
    <script>
    function Authenticate(){
            if(document.getElementById('P').value==="1234" ){
                <?php 
                    $_SESSION['pass']="<script> document.getElementById('P').value; <script>";  ?>
                document.getElementById('oper').style.display='block';
            }
    }
    
    </script>    
</head>
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
        $prod_name="";
        $prod_desc="";
        $designNo="";
        $quantity="";
        $sellPr="";
        $costPr="";
        $prod_img="";

        if(isset($_REQUEST['prdinsr'])){
            if(($_REQUEST['prod_name']=="") || ($_REQUEST['prod_desc']=="") || ($_REQUEST['designNo']=="") || ($_REQUEST['quantity']=="") || ($_REQUEST['sellPr']=="") || ($_REQUEST['costPr']=="") || ($_FILES['prod_img']=="")){
                echo "<small>Please fill all fields</small>";
            }else{
                $prod_name=$_REQUEST['prod_name'];
                $prod_desc=$_REQUEST['prod_desc'];
                $designNo=$_REQUEST['designNo'];
                $quantity=$_REQUEST['quantity'];
                $sellPr=$_REQUEST['sellPr'];
                $costPr=$_REQUEST['costPr'];
                $prod_img_name=$_FILES['prod_img']['name'];
                $prod_img_size=$_FILES['prod_img']['size'];
                $prod_img_type=$_FILES['prod_img']['type'];
                $tmp_name=$_FILES['prod_img']['tmp_name'];
                $extnsn=substr($prod_img_name,strpos($prod_img_name,'.')+1);

                if(isset($prod_img_name) && !empty($prod_img_name)){
                    if($extnsn=='jpg' || $extnsn=='jpeg' || $extnsn=='jpe'  || $extnsn=='png' || $extnsn=='gif' ){
                        $location="images/";
                        $filePath=$location.$prod_img_name;
                        if(move_uploaded_file($tmp_name,$filePath)){
                            $sql="INSERT INTO product(prod_name,prod_desc,designNo,quantity,sellPr,costPr,prod_img) VALUES('$prod_name','$prod_desc','$designNo','$quantity','$sellPr','$costPr','$filePath')";
                            $result=mysqli_query($conn,$sql);
                            
                            if($result){
                               //move_uploaded_file($_FILES['prod_img']['temp_name'],"images/$prod_img");
                                echo "You inserted a $prod_name";
                            }else{
                                echo "$result";
                                echo "Unable to insert";
                            }
                        }else{
                            echo move_uploaded_file($tmp_name,$filePath)."uploading failed";
                        }
                    }else{
                        echo "Wrong File format";
                    } 
                }else{
                    echo "Please select a file";
                }
            }
        }
        
    }
?>
<body>
    
    <fieldset class="fs">
    <legend class="lgnd">Authentication: </legend>
    <br><br> 
    <form action="">
    <label for="P" class="lbl"> Password: <label> <input type="password" name="pass" id="P" >
    <br><br> 
    <button type="button" id="authUser" name="authBtn" onclick="Authenticate()" class="btn"> Submit </button>
    </form>
    </fieldset>

    <fieldset id="oper" style="display:none;" class="fs">
    <br><br><legend class="lgnd">Operations</legend> 
    <p style="font-size:20px;"> What operation do you want to perform: </p>
    <form action="" >
    <input type="radio" name="rad1" id="I" onclick="showInsrtOpt()" value="Insert" > <label  for="I"  style="font-size:20px;background-color:rgba(171,71,188,0.8);">Add a new product<label>&nbsp&nbsp&nbsp
    <input type="radio" name="rad1" id="U" onclick="showUpdtOpt()" value="Update" > <label for="U"  style="font-size:20px;">Update product information<label>&nbsp&nbsp&nbsp
    <input type="radio" name="rad1" id="D" onclick="showDeletOpt()" value="Delete" > <label for="D"  style="font-size:20px;">Delete a product<label>&nbsp&nbsp&nbsp
    </form>
    </fieldset>

    <script>
    function showInsrtOpt(){
            if(document.getElementById('I').checked){
                document.getElementById('insert').style.display='block';
                document.getElementById('update').style.display='none';
              document.getElementById('delete').style.display='none';
        }
    }    
    </script>    
    <br><br>
    <fieldset id="insert" style="display:none;" class="fs">
    
    <legend class="lgnd">Add a new product</legend>
    <form action="" method="post" enctype="multipart/form-data">
    <label for="prdname" class="lbl"> Choose Product: </label> <select name="prod_name" id="prdname" placeholder="Category" >
    <option value="Bedroom" > Bedroom </option>
    <option value="Lounge" > Lounge </option>
    <option value="Dining" > Dining </option>
    <option value="School" > School </option>
    <option value="Office" > Office </option>
    </select>
    <label for="prdc" class="lbl"> Product Description: </label> <input type="textarea" name="prod_desc" id="prdc" style="width:200px; height:50px;">
    <label for="dsgn" class="lbl"> Design No: </label> <input type="text" name="designNo" id="dsgn">
    <label for="qnt" class="lbl"> Quantity: </label> <input type="text" name="quantity" id="qnt"> 
    <label for="sp" class="lbl"> Sell Price: </label> <input type="text" name="sellPr" id="sp">
    <label for="cp" class="lbl"> Cost Price: </label> <input type="text" name="costPr" id="cp">
    <label for="pimg" class="lbl"> Product Image: </label> <input type="file" name="prod_img" id="pimg">
    <br><br><input type="submit" name="prdinsr" value="Insert" class="btn">

    </form>
    </fieldset>

    <script>
    function showUpdtOpt(){
            if(document.getElementById('U').checked){
                document.getElementById('insert').style.display='none';
                document.getElementById('update').style.display='block';
                document.getElementById('delete').style.display='none';
        }
    }    
    </script>
    <fieldset id="update" style="display:none;" class="fs">
    <legend class="lgnd">Update product information</legend>
    <form action="updt.php"  >
    <label for="prdname" class="lbl"> Choose Product: </label> <select name="prod_name" id="drpdwn" placeholder="Category" >
    <option value="Bedroom" id="bd"> Bedroom </option>
    <option value="Lounge"  id="lg"> Lounge </option>
    <option value="Dining"  id="dg"> Dining </option>
    <option value="School"  id="sc"> School </option>
    <option value="Office"  id="of"> Office </option>
    </select>
    <label for="dsgn" class="lbl"> Design No: </label> <input type="text" name="designNo" id="dsgn" required="required"><br>
    <input type="hidden" name="hidPdNm" value="<?php echo $_REQUEST['prod_name'];  ?> "><br>
    <input type="hidden" name="hidDsgn" value="<?php echo $_REQUEST['designNo'];  ?> "><br>
    <br><br><button type="submit"  name="updtBtn" class="btn"> Show Information </button>
    </form>
    </fieldset>
    
    <script>
    function showDeletOpt(){
            if(document.getElementById('D').checked){
                document.getElementById('insert').style.display='none';
                document.getElementById('update').style.display='none';
                document.getElementById('delete').style.display='block';
        }
    }    
    </script>

    <fieldset id="delete" style="display:none" class="fs">
    <legend class="lgnd">Delete a product</legend><br><br><br>
    <form action="" method="post" >
    <label for="prdname" class="lbl"> Choose Product: </label> <select name="prod_name" id="prdname" placeholder="Category" >
    <option value="Bedroom"> Bedroom </option>
    <option value="Lounge"> Lounge </option>
    <option value="Dining"> Dining </option>
    <option value="School"> School </option>
    <option value="Office"> Office </option>
    </select>
    <label for="dsgn" class="lbl"> Design No: </label> <input type="text" name="designNo" id="dsgn"><br>
    
    <!-- <label for="pimg"> Product Image: </label> <input type="file" name="prod_img" id="pimg"> -->
    <!-- <input type="hidden" name="delid" value=""> -->
    <br><input type="submit" name="prddelt" value="Delete" class="btn" >
    </form>
    </fieldset>

    <?php
         if(isset($_REQUEST['prddelt'])){
            $designNo=$_REQUEST['designNo'];
            $prod_name=$_REQUEST['prod_name'];
            $sq="DELETE FROM product WHERE designNo='$designNo'";
            $res=mysqli_query($conn,$sq);
            if($res){
                echo "You deleted $prod_name ";
            }else{
                echo "Unable to delete";
            }
        }
    ?>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>