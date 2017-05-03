

<?php

// fetching all book details 

include_once "classes/DatabaseQueries.php";

$con = new DatabaseQueries();

$sql = "SELECT * FROM  tbl_product";

$books = $con->fetch_data($sql);




?>


<?php include('includes/header.php'); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer" style="height:350px;background:url('books_cover/books_banner.jpg'); ">
            
           
        </header>

        <hr>
<div class="row">
    
    <div class="col-md-3">
    <h4>Categories</h4>
        <ul>
            <li><a href="#">Stories a</a></li>
            <li><a href="#">Stories a</a></li>
            <li><a href="#">Stories a</a></li>
            <li><a href="#">Stories a</a></li>
        </ul>


    </div>
     <div class="col-md-9">
        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Books</h3>
            </div>
        </div>
        <!-- /.row -->



<table>
<tr>
   <?php 
   $i = 0;
   foreach ($books as $val) {
      if ($i % 4 === 0) {
            echo '</tr><tr>';
        }

        ?>

        
    </div>
  <td style="padding: 10px">


  <div class="block" >
    
            <a class="img_pro " href="pages/book_details.php?id=<?php echo $val['product_id']; ?>">
                <img src="books_cover/<?php echo $val['product_image']; ?>" alt="Happy Times in  Noisy Village" title=" Happy Times in  Noisy Village " width="86" height="133"></a>
            <br>
            <a class="name_product left" href="pages/book_details.php?id=<?php echo $val['product_id']; ?>">
                 <?php echo $val['product_name']; ?></a>
            
            <div class="clear"></div>
            
             <div class=" discription">
            Lorem ipsum dolor sit amet, consectetuer a...
            </div>
            <div class="clear"></div>
            
            
            <div class="price_price left"><span>Price:</span>
                 <?php echo $val['product_price']; ?></div>
            
            
            
            <!--<a class=" pin_to  right"  href="http://www.test-demo.com/~democom1/OS/300111165/product_info.php?products_id=84&amp;osCsid=88jl1qd2et2bbk3jstaq37v0a0">
                details
            </a>-->
            <div class="clear"></div>   
            <a class="btn btn-default " href="pages/book_buy.php?id=<?php echo $val['product_id']; ?>">
            Buy Now
            </a>
            
        
        <div class="clear"></div><br>
  </td>

      <?php
      $i++;
   }
   ?>
</tr>
</table>



</div>
</div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

<?php include('includes/footer.php'); ?>