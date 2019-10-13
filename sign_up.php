<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" href="loginPg.css" type="text/css">

</head>
<?php
    session_start();
    $db_host="localhost";
    $db_user="root";
    $db_password="";
    $db_name="project_db";

    $conn=mysqli_connect($db_host,$db_user,$db_password,$db_name);

    $name="";
    $email="";
    $password="";
    $address="";
    $contact="";

    if(!$conn){
        die("Connection Failed");    
    }else{
        //echo "Connection ";
        if(isset($_REQUEST['submit'])){
            if(($_REQUEST['name']=="") || ($_REQUEST['email']=="") || ($_REQUEST['password']=="")){
               echo "<small>Please fill all fields</small>";
            }else
                {
                $name=$_REQUEST['name'];
                $email=$_REQUEST['email'];
                $password=$_REQUEST['password'];
                $pass_rep=$_REQUEST['pass_rep'];
                $address=$_REQUEST['address'];
                $contact=$_REQUEST['contact'];
                $sql="SELECT * FROM customer WHERE email='$email'";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_num_rows($result);
                if($password==$pass_rep){
                if($row>0){
                    echo "This email is already registered";
                }else{
                  //echo $name;
                    $sq="INSERT INTO customer (name,email,password,address,contact) VALUES('$name','$email','$password','$address','$contact')";
                    $res=mysqli_query($conn,$sq);
                    //echo $res;
                    if($res){
                       $_SESSION['name']=$name;
                       $_SESSION['password']=$password; 
                       $_SESSION['email']=$email;
                       echo $_SESSION['name'];
                      echo ",Emblazoned Welcomes YOU!!";
                    }else{
                      echo "Unable to insert";
                    }
                }
                }else{
                    echo"<small>Repeat the same password...</small>";
                }     
           }
        }
    }

?>
    
<body style="overflow:hidden">

<form action="" method="post" class="box" width="500px">
    <h1>Sign Up</h1>
    <input type="text" name="name" id="Name" placeholder="Enter Name" required>
    <input type="email" name="email" placeholder="Enter Email" id="Email" required>
    <input type="password" name="password" id="Password" placeholder="Enter Password" maxlength="20" required>
    <input type="password" name="pass_rep" placeholder="Repeat Password" maxlength="20" id="psw-repeat" required>  
    <input type="text" name="address" placeholder="Enter Address" maxlength="60" id="addr" required>
    <input type="tel" name="contact" placeholder="Enter Contact No." maxlength="20" id="cntct" required>
    <input type="button" class="btn" value="Cancel" onclick="location.href = 'home.php';">
    <input type="submit" name="submit"  class="btn" value="Sign me up">
</form>

<?php  mysqli_close($conn); ?>
</body>
</html>