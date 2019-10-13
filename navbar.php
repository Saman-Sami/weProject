<!-- <?php session_start(); ?> -->
<style>
    body {margin:0;font-family:Times New Roman}
.topnav {
  overflow: hidden;
  background-color:white;
}
.topnav a {
  float:left;
  display: block;
  color:black;
  text-align: center;
  padding: 10px 15px;
  text-decoration: none;
  font-size: 20px;
}
.active {
  background-color: #d19fe4;
  color: white;
}
.topnav .icon {
  display:none;
}
.dropdown {
  float: left;
  overflow: hidden;
}
.dropdown .dropbtn {
  font-size: 20px;    
  border: none;
  outline: none;
  color: black;
  padding: 10px 15px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9 ;  
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a {
  float: none;
  color: black;
  padding: 10px 15px;
  text-decoration: none;
  display: block;
  text-align: left;
}
.topnav a:hover, .dropdown:hover .dropbtn {
   background-color: #d19fe4;  /*#555 */
  color: white;
}
.dropdown-content a:hover {
  background-color: #d19fe3 ;    /*#ddd*/
  color: black;
}
.dropdown:hover .dropdown-content {
  display: block;
}
.hou{
  float: left;
  overflow: hidden;
}
.hou .btn {
  font-size: 20px;    
  border: none;
  outline: none;
  color: black;
  padding: 10px 15px;
  background-color:#d19fe0;
  font-family: inherit;
  margin: 0;
  width:200px;
  text-align:left;
}
.hou-content {
  display:none;
  position: absolute;
  background-color: #d19fe3 ;   /*#f9f9f9*/
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  left:50%;
}
.hou-content a {
  <!--float: right;-->
  color: black;
  padding: 10px 15px;
  text-decoration: none;
  display:block;
  text-align:left;
  <!--width:100px;-->
}
.hou-content a:hover {
  background-color:#ddd;
  color: black;
}
.hou:hover .hou-content { 
 display: block;
}
@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}
@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>
<div style="background-image:linear-gradient(#8a25b1,#d19fe4);font-size:34px;height:70px;color:white;padding:10px;">Emblazoned</div>  <!--background-color:rgb(171, 71, 188)-->
 <div class="topnav" id="myTopnav">
<a href="home.php">Home</a>      <!--class="active"-->

  <div class="dropdown">
    <button class="dropbtn">Categories 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <div class="hou">
        <button class="btn"><a href="">House</a>
      </button>
    <div class="hou-content">
     <a href="bedroom.php">Bedroom</a>
      <a href="lounge.php">Lounge</a>
       <a href="dining.php">Dining</a>
   </div>
  </div> 
      <a href="school.php">School</a>
      <a href="office.php">Office</a>
    </div>
  </div> 
<a href="sign_up.php" target="_self">SignUp</a>
<a href="sign_in.php" target="_self">SignIn</a>
<a href="home.php?logout" target="_self">Logout</a>
<a href="about.php">About</a>
<a href="car.php" style="float:right;" >
<span style="margin:8px">
<i class="fa fa-shopping-basket" aria-hidden="true"></i></span>Cart
<?php
    if (isset($_SESSION['cart'])){
      $count = count($_SESSION['cart']);
      echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
    }else{
      echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
}
?>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<br>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<?php
 if(isset($_GET['logout'])){
   $_SESSION=array();
   session_unset();
  session_destroy();
  // header('location:home.php'); 
 }
?>