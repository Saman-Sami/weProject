<!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
<link type="text/css" href="car.css" rel="stylesheet">
<header id="header">
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <!-- <a href="allProd1.php" class="navbar-brand"> -->
   <!-- <a href="comp.php" class="navbar-brand"> -->
        <h3 class="px-5">
        <i class="fa fa-shopping-basket" aria-hidden="true"></i> Shopping Cart
        </h3>
    <!-- </a> -->
    <button class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target = "#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup"
        aria-expanded="false"
        aria-label="Toggle navigation"
    >
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="mr-auto"></div>
        <div class="navbar-nav">
        <a href="car.php" class="nav-item nav-link active">
        <h5 class="px-5 cart">
        <!-- <a href="path/to/shopping/cart" class="btn btn-primary" aria-label="View 3 items in your shopping cart"> -->
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart
        <?php
            if (isset($_SESSION['cart'])){
                $count = count($_SESSION['cart']);
                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
            }else{
                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
            }
        ?>
        </h5>
        </a>
        </div>
        </div>
        </div>
   </nav>
</header>