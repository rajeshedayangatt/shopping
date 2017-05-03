<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/heroic-features.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		.ratingPositive {
    border: 2px solid #00b700;
    color: #00b700;
}
.userAggregatedRatingBox {
    height: 50px;
    width: 50px;
    border-radius: 50%;
    background-color: #ffffff;
    font-size: 1.4em;
    text-align: center;
    line-height: 45px;
    margin: 5px;
    padding: 0;
    font-weight: bold;
}
	</style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                        <li>
                        <a href="#">Register</a>
                    </li>
                        <li>
                        <a href="#">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<?php include("../classes/DatabaseQueries.php"); ?>
<?php


$con = new DatabaseQueries();



$sql = "SELECT t1.*,t2.* FROM tbl_order t1 LEFT JOIN tbl_order_item t2 ON t2.order_id = t1.order_id WHERE t1.order_status='NOT PAYED' AND t1.customer_id ='2'";



$cart = $con->fetch_data($sql);



 ?>

<div class="container">



	 
	<h1> Shopping Cart</h1><br>
	 
      
<table class='table table-bordered table-striped'>

<tr>
<th>sl no </th>
<th>Product Name</th>
<th>Quantity</th>
<th>Price</th>
<th>Total</th>
<th>Action</th>

</tr>

<?php
$sum = "";
 $i=1; foreach($cart as $c): ?>

<tr>
<td><?php echo $i; ?></td>
<td><?php echo $c['product_id']; ?></td>
<td><?php echo $c['product_quantity']; ?></td>
<td><?php echo $c['product_price']; ?></td>
<td><?php 
$total = $c['product_price'] * $c['product_quantity'];
$sum += $total;
echo "<span>Rs.</span>".$total; ?></td>
<td>
<button class="btn btn-danger">Remove</button>
</td>
</tr>

<?php $i++; endforeach; ?>

<tr>
<td colspan='4'></td>
<td>
<?php echo "<span>Rs.</span>". $sum; ?>
</td>
</tr>
</table>
<fieldset>	  
		  
		  
		            <div class="accordion" id="accordion2">
            <div class="accordion-group">
              <div class="accordion-heading">

                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                  <h3>Apply discount code</h3>
                </a>
              </div>
              <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
          <div class="control-group">
            <label for="input01" class="control-label">Discount code: </label>
            <div class="controls">
              <input id="input01" class="input-xlarge" placeholder="Enter your coupon here" type="text">
              <p class="help-block">You can only use one discount code at a time</p>
            </div>
          </div>
                </div>
              </div>
            </div>

            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
					<h3>Use gift voucher</h3>
                </a>
              </div>
			                <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
          <div class="control-group">
            <label for="input01" class="control-label">Gift voucher: </label>
            <div class="controls">
              <input id="input01" class="input-xlarge" placeholder="Enter your gift voucher here" type="text">
              <p class="help-block">You can use multiple gift vouchers at a time</p>
            </div>
          </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
	  
			<div class="span5">
            <a href="checkout.html" class="btn btn-primary pull-right">Checkout</a>
			</div>
          </div>
        </fieldset>



</div>


    
  <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>



</body>

</html>