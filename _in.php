<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    <style>
body {
  font-family: TimesNewRoman;
  /* background-image:url("https://www.head2bed.co.uk/images/products/galleries/1056/blowup/stylform-selene-modern-bed-in-sahara-faux-leather.jpeg?id=7131"); */
}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password], input[type=email] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button, input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 15px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
}

button:hover, input[type=submit]:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 10px 15px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.btn {
  float: center;
  width: 20%;
}

/* Add padding to container elements */
.container {
  padding: 10px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .btn {
     width: 100%;
  }
}
</style>
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
<?php require_once('navbar.php')?>
    <form action="" method="post" style="border:1px solid #ccc">
    <div class="container">
    <h1>Sign In</h1>
    <p>Please fill this form to signin.</p>
    <hr>

    <label for="Name">Name:</label>
    <input type="text" name="name" id="Name" placeholder="Enter Name" required><br><br>

    <label for="Password">Password:</label>
    <input type="password" name="password" id="Password" placeholder="Enter Password" maxlength="20" required><br><br>
    
    <div class="clearfix">
    <center>
    <input type="submit" name="signin" class="btn" value="Sign in">
    </center>
    </div>
    </div>
    </form>

<?php
    mysqli_close($conn);
?>
</body>
</html>