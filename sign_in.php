<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
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
    $password="";

    if(!$conn){
        echo "Connection Failed";
        mysqli_error($conn);      
   }else{
    //    echo "Connection";
       if(isset($_REQUEST['signin'])){
          $name=$_REQUEST['name'];
          $password=$_REQUEST['password'];
          $sql="SELECT * FROM customer WHERE name='$name' AND password='$password'";
          $result=mysqli_query($conn,$sql);
          $row=mysqli_num_rows($result);
          if($row==1){
            $data=mysqli_fetch_assoc($result);
            $email=$data['email'];
            $_SESSION['name']=$name;
            $_SESSION['password']=$password;
            $_SESSION['email']=$email;
            header('location:home.php');  
          }else{
            echo "Enter correct name and password";
          }
        }else{
        //    echo"123";
       }
    }

?>
<body>

    <form action="" method="post" class="box">
    <h1>Sign In</h1>
    <input type="text" name="name" id="Name" placeholder="Username" required>
    <input type="password" name="password" id="Password" placeholder="Password" maxlength="20" required>
    <input type="submit" name="signin" class="btn" value="Sign in">

    </form>

<?php
    mysqli_close($conn);
?>
</body>
</html>