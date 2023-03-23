<?php
//index.php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Coffee Shop</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        * {
    box-sizing: border-box;
  }
  
  /* Style inputs */
  input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }
  
  input[type=submit] {
    background-color: #04AA6D;
    color: white;
    padding: 12px 20px;
    border: none;
    cursor: pointer;
  }
  
  input[type=submit]:hover {
    background-color: #45a049;
  }
  
  /* Style the container/contact section */
  
  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
  
  /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 600px) {
    .column, input[type=submit] {
      width: 100%;
      margin-top: 0;
    }
  }
    </style>
</head>
 
<body>
    <header>
        <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Coffee Shop</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="products.php">Menu</a></li>
      <li><a href="#aboutus">About Us</a></li>
      <li><a href="#contact">Contact</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Admin</a></li>    </ul>

  </div>
</nav>
</header>
 
<div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
        <img src="
        https://assets.bonappetit.com/photos/57c5d0e36a6acdf3485dfb2b/16:9/w_1280,c_limit/3717295073_f5ae257d71_o.jpg
        " class="responsive" alt="slide1">
        <div class="carousel-caption">
            <h3>Perfectly roasted beans</h3>
            <p>Locally sourced</p>
        </div>
    </div>

    <div class="item">
      <img src="https://asiatop80.com/submit/uploads/13760/91-92379-20/full/6e2dbca9591dfdd9ab802a8176ce1880.jpg
      " class="responsive" alt="slide2">
      <div class="carousel-caption">
            <h3>Freshly brewed coffee</h3>
            <p>Expert baristas</p>
        </div>
    </div>

    <div class="item">
      <img src="
      https://cdn.gobankingrates.com/wp-content/uploads/2019/05/coffee-prices-in-Tel-Aviv-Israel-shutterstock_400711921.jpg?w=1280&quality=75
      " class="responsive" alt="slide3">
      <div class="carousel-caption">
            <h3>Good looking and good tatsing</h3>
            <p>Latte art galore</p>
        </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

       <div class="container">
        <div class="row">
        <div class="col-md-4 col-xs-4 col-lg-4">
       <h2>Our Products</h2></div></div>
        <div class="row">
        <div class="col-md-2 col-xs-2 col-lg-2"></div>
        <div class="col-md-2 col-lg-2 col-xs-2">
        <a href="products.php"><img id="product-preview" class="img-responsive"  src="https://www.vegrecipesofindia.com/wp-content/uploads/2018/02/cafe-style-hot-coffee-recipe-1-500x500.jpg" alt="coffee1"></a>
        </div>

        <div class="col-md-2 col-lg-2 col-xs-2">
        <a href="products.php"><img id="product-preview" class="img-responsive"  src="https://www.funfoodfrolic.com/wp-content/uploads/2020/09/Cold-Coffee-Thumbnail-500x500.jpg" alt="coffee2"></a>
        </div>

        <div class="col-md-2 col-lg-2 col-xs-2">
        <a href="products.php"><img id="product-preview" class="img-responsive"  src="https://www.siftandsimmer.com/wp-content/uploads/2021/05/vietnamese-coffee-french-toast2-500x500.jpg" alt="coffee3"></a>
        </div>

        <div class="col-md-2 col-lg-2 col-xs-2">
        <a href="products.php"><img id="product-preview" class="img-responsive"  src="https://i.pinimg.com/564x/7c/bf/d8/7cbfd8a671105af1fbb7512e76464ca7.jpg" alt="coffee3"></a>
        </div>
        
        
        </div>
    </div>
    <br>
    <hr>
    <br>
    
    <div class="container-fluid" id="aboutus">
  <div class="row">
    
    <div class="col-md-6 col-lg-6">
      <img src="https://www.yourfreecareertest.com/wp-content/uploads/2018/03/become_a_barista.jpg" width="500px" alt="BARISTAR">
    </div>
    <div class="col-md-6 col-xs-11 col-lg-6">
      <h2>About Our Coffee Shop</h2>
      <p>
        Our coffee shop is bringing premium coffee at an affordable price. The coffee that we serve is made from roasted loccally sourced coffee beans that are 100% organic. We also help support the local people by hiring people with little to none job experience. <br>
</p><p>
        We garantee that our coffee is the best for miles with no one to compete with our friendliness, customer service, prices, and tatse. Not only do we serve amazing and unique coffee we also serve a variety of food, and we specialize ,but are not limited to all day breakfast. <br>     
    </p>
    </div>
  </div>
</div>
<br>
    <hr>
    <br>

    <div class="container" id="contact">
    <div>
        <h2>Contact Us</h2>
        <p>Swing by for a cup of coffee, we're open from 6AM to 9PM for your coffee and peckish needs. Or if you want you can leave us a message:</p>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6">
        <iframe width="450" height="400" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15635.397038160265!2d104.9207247!3d11.562662!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcac6753bebe2e9d2!2sUniversity%20of%20Puthisastra!5e0!3m2!1sen!2skh!4v1660491937559!5m2!1sen!2skh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-md-6 col-lg-6">
        <form action="">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Your name..">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname" placeholder="Your last name..">
            <label for="country">Country</label>
            <select id="country" name="country">
            <option value="australia">Australia</option>
            <option value="canada">Canada</option>
            <option value="usa">USA</option>
            </select>
            <label for="subject">Subject</label>
            <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
            <input type="submit" value="Submit">
        </form>
        </div>
    </div>
    </div>
        
        <br />
        </div>
    </div>
    <footer>
    <div class="container">
    <hr>
        <div class="text-center center-block">
                <a href="https://www.facebook.com/bootsnipp"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
	            <a href="https://twitter.com/bootsnipp"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
	            <a href="https://plus.google.com/+Bootsnipp-page"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
	            <a href="mailto:bootsnipp@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
                <br>
                <p style="color:gray">@ 2022 Coffee shop</p>
            </div>

    <hr>
</div>
    </footer>
</body>
 
</html>
 
