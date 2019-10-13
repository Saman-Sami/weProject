<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
<style>
body {font-family: TimesNewRoman;}

* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password], input[type=email], input[type=address], input[type=tel] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=address]:focus, input[type=tel]:focus {
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
  width: 400px;
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
.cancelbtn, .signupbtn {
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
  .cancelbtn, .signupbtn {
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
    
<body>
<?php require_once('navbar.php')?>
<form action="" method="post" style="border:1px solid #ccc">
<div class="container">
<h1>Sign Up</h1>
<p>Please fill in this form to create an account.</p>
<hr>

<label for="Name">Name:</label>
    <input type="text" name="name" id="Name" placeholder="Enter Name" required><br><br>

<label for="Email">Email:</label>
    <input type="email" name="email" placeholder="Enter Email" id="Email" required><br><br>

<label for="Password">Password:</label>
    <input type="password" name="password" id="Password" placeholder="Enter Password" maxlength="20" required><br><br> 

<label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" name="pass_rep" placeholder="Repeat Password" maxlength="20" id="psw-repeat" required>  

<label for="addr"><b>Address</b></label>
   <input type="text" name="address" placeholder="Enter Address" maxlength="60" id="addr" required>

<label for="cntct"><b>Contact No.</b></label>
   <input type="tel" name="contact" placeholder="Enter Contact No." maxlength="20" id="cntct" required>


  <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
<p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

<div class="clearfix">
<center>
<button type="button" class="cancelbtn" onclick="location.href = 'home.php';">Cancel</button>
<input type="submit" name="submit"  class="signupbtn" value="Sign me up">
</center>
</div>
</div>
</form>

<?php  mysqli_close($conn); ?>
</body>
</html>