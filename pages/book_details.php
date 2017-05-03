
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

$id = $_GET['id'];

$sql = "SELECT * FROM  tbl_product WHERE product_id = '$id'";

$books = $con->fetch_data($sql);




 ?>
<div class="container">

<div class="row">
<?php foreach($books as $book): ?>
	<div class="col-md-4">
		<img src="../books_cover/<?php echo $book['product_image']; ?>" title="Romeo and Juliet (Folger Shakespeare Library)" width="300" height="400"  class="bookMainImage" itemprop="image">

	</div>
	<div class="col-md-8">
		<div >
                <h1 class="bookMainTitle" itemprop="name">
                 <?php echo $book['product_name']; ?></h1>

                
                  <div itemprop="author">Author :  <?php echo $book['product_author']; ?>
                  	
                  </div>
                
				<div>
					
					<h3 style="background: #ececec;padding: 5px;">Review & rating</h3>
					<div class="row">
							<div class="col-md-4">
								<div class="userAggregatedRatingBox ratingPositive" itemprop="ratingValue">
                     			 3.7
                   					 </div>
							</div>
								<div class="col-md-8 ">

				                  <span class="text-12">User Rating</span><br>
				                  <span>based on
				                    <a href="#reviewSnapshot">
				                      <span itemprop="ratingCount">1272118</span>
				                      ratings
				                    </a>
				                  </span><br>
				                  <span>from 3 online stores</span><br>
				                </div>

					</div>
					
				
				</div>

				<div>
					<h3 style="background: #ececec;padding: 5px;">Book Price</h3>
				
                        <div class="span6">
			<h2>
				<strong>Price: <?php echo "Rs " .$book['product_price']; ?></strong> <br><br>
			</h2>
		</div>
                        <form class="form-inline" id="cart_form<?php echo $book['product_id']; ?>">
                                <div class="span3 no_margin_left">
                                    <label>Qty:</label>
                                    <input type="hidden" name="product_id" value="<?php echo $book['product_id']; ?>">
                                     <input type="hidden" name="product_price" value="<?php echo $book['product_price']; ?>">
                                    <input class="span1" placeholder="1" name="product_qnty" type="text" style="width:50px;">
                                    <button class="btn btn-primary" type="submit" onclick="return addtocart(<?php echo $book['product_id']; ?>)">Add to cart</button>
                                </div>	
                                <div class="span1">
                                - OR -
                                </div>	
                                <div class="span2">
                                    <p><a href="#">Add to Wish List</a></p>
                                    <p><a href="compare.html">Add to Compare</a></p>
                        </div>	
                    </form>
						
				</div>

				<div>
					
					<h3 style="background: #ececec;padding: 5px;">Book Information</h3>
				</div>
                
                
                

            </div>

	</div>
</div>

<div class="row">

<div class="col-md-12">
	
	<h3 style="background: #ececec;padding: 5px;">Book Description</h3>
	<p>
		<?php echo $book['product_description']; ?>
	</p>
</div>
	
<div class="col-md-12">
	
	<h3 style="background: #ececec;padding: 5px;">Users who liked this book, also like</h3>
	
</div>

<div class="col-md-12">
	
	<h2 class="bookPageHeading">Reviews : <?php echo $book['product_name']; ?></h2>
	
</div>
	
</div>

<?php endforeach; ?>



</div>



  <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

<script>

function addtocart(i) {
var formdata = $("#cart_form"+i).serialize();

    $.ajax({

        type:'post',
        url :'../functions/addcart.php',
        data:formdata,
        success:function(msg){
            alert(msg);
        }


    });

    return false;
}
</script>

</body>

</html>