<?php
    include 'header.php';
    if(!($_COOKIE["logged_in"])){
        header('Location: signin1.php');
    }
    else{
        $sum_quant_sql = "SELECT SUM(quantity) as itemcount FROM product WHERE username = '".$_COOKIE["username_bake"]."' GROUP BY username";
        $result = $conn->query($sum_quant_sql);
        $items_cart = 0;
        while($row = $result->fetch_assoc()) {
            $items_cart = $row["itemcount"];
        }

        $sum_price_sql = "SELECT SUM(productprice) as itemprice FROM product WHERE username = '".$_COOKIE["username_bake"]."' GROUP BY username";
        $result = $conn->query($sum_price_sql);
        $items_price = 0;
        while($row = $result->fetch_assoc()) {
            $items_price = $row["itemprice"];
        }

        $emailGetter_sql = "SELECT email FROM user WHERE username = '".$_COOKIE["username_bake"]."'";
        //$all_cart_items = "SELECT username,productprice,productname,quantity FROM product WHERE username = '".$_COOKIE["username_bake"]."' order by productname";
        $result = $conn->query($emailGetter_sql);
        while($row = $result->fetch_assoc()) {
            $emailUser = $row["email"];
        }
        //$items_cart = 0;
        //print_r($all_cart_items);
            
    }
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta charset="UTF-8" />
    <title>The Bakery: Sweet Delights</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    
    <style type="text/css">
        .auto-style1 {
            width: 945px;
            height: 211px;
        }
        .auto-style2 {
            width: 170px;
            height: 216px;
        }
        .auto-style3 {
            width: 202px;
            height: 183px;
        }
        .auto-style5 {
            width: 153px;
            height: 188px;
        }
        .auto-style6 {
            left: 30px;
            top: 22px;
            width: 398px;
            height: 197px;
        }
        .auto-style7 {
            left: 0px;
            top: 19px;
            height: 220px;
        }
        .auto-style8 {
            left: -5px;
            top: 7px;
            height: 217px;
        }
        .auto-style12 {
            left: 30px;
            top: 20px;
            height: 73px;
        }
        .auto-style13 {
            width: 230px;
            height: 212px;
        }
        .auto-style18 {
            left: -2px;
            top: 0px;
            height: 1065px;
            width: 902px;
        }
        .auto-style19 {
            height: 250px;
            width: 453px;
        }
        .auto-style20 {
            left: 30px;
            top: 20px;
            height: 197px;
            width: 198px;
        }
        .auto-style21 {
            width: 160px;
            height: 178px;
        }
        .auto-style22 {
            width: 136px;
            height: 180px;
        }
        .auto-style24 {
            left: 2px;
            top: 0px;
        }
        .auto-style25 {
            left: 2px;
            top: 0px;
            height: 214px;
        }
        .auto-style26 {
            left: 30px;
            top: 20px;
            height: 131px;
        }
        .auto-style27 {
            width: 41px;
            height: 37px;
        }
        </style>
    </head>
<body>
        <div id="header">
        <div>
            <div>
                <div id="logo">
                    <img src="images/logo.gif" alt="Logo"/>
                </div>
                <div>
                    <div>
                        <a href="cart.php" >Hello, <?php echo $_COOKIE["username_bake"]; ?></a>
                        <a href="logout.php"> Logout </a>
                        <a href="sample.php" class="last">Help</a>
                    </div>
                    <form action="#">
                        <input type="text" id="search" maxlength="30" />
                        <input type="submit" value="" id="searchbtn" />
                    </form>
                    </div>
            </div>
            <ul>
                <li class="current"><a href="index.php">Home</a></li>
                <li ><a href="product.php">The Bakery shop</a></li>
                <li><a href="about.php">About us</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
            <div class="section">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/bakeryback.gif" alt="Image" class="auto-style1"/>&nbsp;
            </div>
        </div>
    </div>
    <div class="container">
        
        <div class="row">
            <div class="col-md-8">
                <h1>The Bakery shop</h1>
                <br/>
                <h3>Make Payment</h3>
            </div>
            <div class="col-md-4">
                <br/>    
                 <p> <a href="#"><img src="images/images.gif" class="auto-style27" /></a> <?php echo $items_cart; ?> items(s) in the cart. Total Price: <?php echo $items_price; ?> Rs.</p>
            </div>
        </div>
                    
        
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Please Enter your Address Information below</h5>
                        <form action = "storeAddress.php" METHOD="POST">
                            <div class="form-group"> Address Line Number 1: <input type="text" name="address1" required placeholder="Enter the 1st line of your address here"> </div>
                            <div class="form-group"> Address Line Number 2: <input type="text" name="address2" placeholder="Enter the 2nd line of your address here"> </div>
                            <div class="form-group"> Name: <input type="text" name="realname" required placeholder="Enter your full name"></div>
                            <div class="form-group"> E-mail Address: <input type="text" readonly name="email" value="<?php echo $emailUser; ?>"> </div>
                            <div class="form-group"> Mobile Number <input type="text" name="mobilenumber" required pattern="[0-9]{10,12}"></div>
                            <input type="submit" name="submit-btn" value="Store Address">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                         <h5>Payment Information</h5>
                        <form action = "makePayment.php" METHOD="POST">
                            <input type="hidden" name="email" value="<?php echo $emailUser; ?>">
                            <div class="form-group"> Card Number <input type="text" name="cardnumber" required placeholder="Enter valid 16 digit card number" pattern="[0-9]{16}"> </div>
                            <div class="form-group"> Expires <input type="number" min="1" max="12" step="1.0" value="3" name="expiresmonth"> <input type="number" min="2017" max="2027" step="1" value="2017" name="expiresyear"></div>
                            <div class="form-group"> Security codes<input type="password" name="Securitycode" required></div>
                            <input type="submit" name="submit-btn" value="Make Payment">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <ul class="pager">
            <li class="next"><a href="home.php">Return to Home</a></li>
        </ul>



    </div>
                
                
                
        </div>
    </div>
    <div id="footer">
        <div class="section">
            <div>
                <div class="aside">
                    <div class="auto-style17">
                        <div>
                            <b>Too <span>BUSY</span> to shop?</b>
                            <a href="signin.php">Sign up for free</a>
                            <p>and we&#39;ll deliver it on your doorstep</p>
                        </div>
                    </div>
                </div>
                <div class="connect">
                    <span>Follow Us</span>
                    <ul>
                        <li><a href="http://facebook.com/" target="_blank" class="facebook">Facebook</a></li>
                        <li><a href="http://twitter.com/" target="_blank" class="twitter">Twitter</a></li>
                        <li><a href="#" class="subscribe">Subscribe</a></li>
                        <li><a href="http://www.flickr.com/" target="_blank" class="flicker">Flicker</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div id="navigation">
            <div>
                <ul>
                    <li class="first"><a href="index.php">help</a></li>
                    <li><a href="index.php">about cake delight</a></li>
                    <li><a href="index.php">cake delight talk</a></li>
                    <li><a href="index.php">developers</a></li>
                    <li><a href="index.php">privacy policy</a></li>
                    <li><a href="index.php">terms of use(updated 10/15/08)</a></li>
                </ul>
                <p>Copyright &copy; 2006-2008 cake delight  All rights reserved</p>
            </div>
        </div>
    </div>



    
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>






