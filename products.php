<!DOCTYPE html>
<html>
<head>
    <title>Coffee Shop</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
 
<body>
    <header>
        <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Coffee Shop</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="products.php">Menu</a></li>
      <li><a href="index.php#aboutus">About Us</a></li>
      <li><a href="index.php#contact">Contact</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li> <a id="cart-popover" class="btn" data-placement="bottom" title="Shopping Cart">
                                <span class="glyphicon glyphicon-shopping-cart"></span>
                                <span class="badge"></span>
                                <span class="total_price">$ 0.00</span>
                            </a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
      
    </ul>

  </div>
</nav>
</header>
 
        <div id="popover_content_wrapper" style="display: none">
            <span id="cart_details"></span>
            <div align="right">
                <a href="order_process.php" class="btn btn-primary" id="check_out_cart">
                    <span class="glyphicon glyphicon-shopping-cart"></span> Check out
                </a>
                <a href="#" class="btn btn-default" id="clear_cart">
                    <span class="glyphicon glyphicon-trash"></span> Clear
                </a>
            </div>
        </div>

        <div class="container">
        <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Menu</a></li>
  <li><a data-toggle="tab" href="#menu1">Drinks Menu</a></li>
  <li><a data-toggle="tab" href="#menu2">Food Menu</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>All</h3>
    <div id="display_item" class="row"></div>
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Drinks</h3>
    <div id="display_drink" class="row"></div>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Food</h3>
    <div id="display_food" class="row"></div>
  </div>
</div>
       
 
 
        <br />
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
 
<script>
    $(document).ready(function() {
 
        load_product();

        load_drink();

        load_food();
 
        load_cart_data();
 
        function load_product() {
            $.ajax({
                url: "fetch_item.php",
                method: "POST",
                success: function(data) {
                    $('#display_item').html(data);
                }
            })
        }

        function load_drink() {
            $.ajax({
                url: "fetch_drink.php",
                method: "POST",
                success: function(data) {
                    $('#display_drink').html(data);
                }
            })
        }

        function load_food() {
            $.ajax({
                url: "fetch_food.php",
                method: "POST",
                success: function(data) {
                    $('#display_food').html(data);
                }
            })
        }
 
        function load_cart_data() {
            $.ajax({
                url: "fetch_cart.php",
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $('#cart_details').html(data.cart_details);
                    $('.total_price').text(data.total_price);
                    $('.badge').text(data.total_item);
                }
            })
        }
 
        $('#cart-popover').popover({
            html: true,
            container: 'body',
            content: function() {
                return $('#popover_content_wrapper').html();
            }
        });
 
        $(document).on('click', '.add_to_cart', function() {
            var product_id = $(this).attr('id');
            var product_name = $('#name' + product_id + '').val();
            var product_price = $('#price' + product_id + '').val();
            var product_quantity = $('#quantity' + product_id).val();
            var action = 'add';
            if (product_quantity > 0) {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        product_name: product_name,
                        product_price: product_price,
                        product_quantity: product_quantity,
                        action: action
                    },
                    success: function(data) {
                        load_cart_data();
                        alert("Item has been Added into Cart");
                    }
                })
            } else {
                alert("Please Enter Number of Quantity");
            }
        });
 
        $(document).on('click', '.delete', function() {
            var product_id = $(this).attr('id');
            var action = 'remove';
            if (confirm("Are you sure you want to remove this product?")) {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        action: action
                    },
                    success: function(data) {
                        load_cart_data();
                        $('#cart-popover').popover('hide');
                        alert("Item has been removed from Cart");
                    }
                })
            } else {
                return false;
            }
        });
 
        $(document).on('click', '#clear_cart', function() {
            var action = 'empty';
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    action: action
                },
                success: function() {
                    load_cart_data();
                    $('#cart-popover').popover('hide');
                    alert("Your Cart has been clear");
                }
            })
        });
 
    });
</script>