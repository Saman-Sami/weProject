<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <style>
    .container {
      width:1150px;
      height:470px;
      border:solid rgb(171, 71, 188);
    }
    .container img{
    width:300px;
    height:300px;
    margin-left:5px;
    margin-top:45px;
    } 
    .container a:hover{
    display:inline;
    opacity:0.6;
    }
    .mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}
/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}
/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}
/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
  <!--border-radius: 100px;-->
}
/* Caption text */
.text {
  color: rgb(171,71,188);
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}
/* Number text (1/5 etc) */
.numbertext {
  color: black;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}
/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}
.active, .dot:hover {
  background-color: #717171;
}
/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}
@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
.cat
{
border:none;
}
.abc a:hover
{
display:inline;
opacity:0.6;}
</style>
</head>
<body>
<?php include_once('navbar.php')?>
<div class="slideshow-container">
<div class="mySlides fade">
  <div class="numbertext">1 / 5</div>
  <img src="prdImg/1.jpg" style="width:100%">
  <div class="text" style="position:center;"><b><i>Exclusive Bed Set with Side tables</i></b></div>
</div>
<div class="mySlides fade">
  <div class="numbertext">2 / 5</div>
  <img src="prdImg/2.jpg" style="width:100%">
  <div class="text"><b><i>Dining Table for 6</i></b></div>
</div>
<div class="mySlides fade">
  <div class="numbertext">3 / 5</div>
  <img src="prdImg/3.jpg" style="width:100%">
  <div class="text"><b><i>3-seater Lounge Sofa with 2 Center Tables.</i></b></div>
</div>
<div class="mySlides fade">
  <div class="numbertext">4 / 5</div>
  <img src="prdImg/4.jpg" style="width:100%">
  <div class="text"><b><i>Beautiful 3-seater Lounge Sofa with wooden Center Table.</i></b></div>
</div>
 <div class="mySlides fade">
 <div class="numbertext">5 / 5</div>
  <img src="prdImg/5.jpg" style="width:100%">
  <div class="text"><b><i>Dining Set for 3 persons available with white center top and plastic chairs.</i></b></div>
</div>
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
</div>
<br><br>
<center>
<b><i><p style="font-size:25px;font-family:Times New Roman;color:rgb(171,71,188);">ALL PRODUCTS</p></i></b>
</center>
<div>
<center>
<b><i><a href="office.php" style="font-size:20px;font-family:Times New Roman;position:absolute;left:7%;bottom:-97%;color:white; background: rgb(171, 71, 188);background: rgba(171, 71, 188, 0.5); width:535px;padding: 20px;">View More</a></i></b>
<img class="abc" src="prdImg/o2.jpg" style="width:570px;height:400px;border:solid rgb(171, 71, 188);">
<b><i><a href="school.php" style="font-size:20px;font-family:Times New Roman;position:absolute;left:50.6%;bottom:-97%;color:white; background: rgb(171, 71, 188);background: rgba(171, 71, 188, 0.5); width:263px;padding: 20px;">View More</a></i></b>
<img src="prdImg/n1.jpg" style="width:300px;height:400px;border:solid rgb(171, 71, 188);">
<b><i><a href="ornaments.php" style="font-size:20px;font-family:Times New Roman;position:absolute;left:73.8%;bottom:-97%;color:white; background: rgb(171, 71, 188);background: rgba(171, 71, 188, 0.5); width:214px;padding: 20px;">View More</a></i></b>
<img class="abc" src="prdImg/d8.jpg" style="width:250px;height:400px;border:solid rgb(171, 71, 188);">
<br><br>
<div class="container">
<br>
<b><a href="" style="font-family:Times New Roman;font-size:20px;color:rgb(171, 71, 188);">House Products</a></b>
<br>
<hr style="border:solid rgb(171,71,188)">
<a href="bedroom.php">
<img src="prdImg/10.jpg">
<a href="lounge.php">
<img  src="prdImg/l4.jpg">
<a href="dining.php">
<img  src="prdImg/dt1.jpg">
<br><br>
<b><i><a href="lounge.php" style="font-size:20px;font-family:Times New Roman;">View More</a></i></b>
</div>
</center>
</div>
<br>
<center>
<b><i><p style="font-size:25px;font-family:Times New Roman;color:rgb(171,71,188);">CATEGORIES</p></i></b>
</center>
<center>
<button type="button" style="border:none;height:225px;width:210px;font-size:20px;background-color:rgb(171, 71, 188);color:white;">
<b><i>Bedroom</i></b>
<a href="bedroom.php"><img src="prdImg/10.jpg" style="width:200px; height:200px;" title="Bedroom" alt="bedroom"></a>
</button>
<button type="button" style="border:none;height:225px;width:210px;font-size:20px;background-color:rgb(171, 71, 188);color:white;">
<b><i>Dining</i></b>
<a href="dining.php"><img src="prdImg/11.jpg" style="width:200px; height:200px;" title="Bedroom" alt="bedroom"></a>
</button>
<button type="button" style="border:none;height:225px;width:210px;font-size:20px;background-color:rgb(171, 71, 188);color:white;">
<b><i>Lounge</i></b>
<a href="lounge.php"><img src="prdImg/l2.jpg" style="width:200px; height:200px;" title="Lounge" alt="lounge"></a><br>
</button>
<br><br>
<button type="button" style="border:none;height:225px;width:210px;font-size:20px;background-color:rgb(171, 71, 188);color:white;">
<b><i>School</i></b>
<a href="school.php"><img src="prdImg/7.jpg" style="width:200px; height:200px;" title="School" alt="school"></a>
</button>
<button type="button" style="border:none;height:225px;width:210px;font-size:20px;background-color:rgb(171, 71, 188);color:white;">
<b><i>Office</i></b>
<a href="office.php"><img src="prdImg/9.jpg" style="width:200px; height:200px;" title="Office" alt="office"></a>
</button>
<button type="button" style="border:none;height:225px;width:210px;font-size:20px;background-color:rgb(171, 71, 188);color:white;">
<b><i>Ornaments</i></b>
<a href="ornaments.php"><img src="prdImg/d4.jpg" style="width:200px; height:200px;" title="Office" alt="office"></a>
</button>
</center>
<br>

<script>
var slideIndex = 1;
showSlides(slideIndex);
function plusSlides(n) {
  showSlides(slideIndex += n);
}
function currentSlide(n) {
  showSlides(slideIndex = n);
}
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

<?php include_once('footer.php')?>
</body>
</html>
