<?php
require_once "db_connection.php";

function getCats(){
    global $con;
    $getCatsQuery = "select * from categories";
    $getCatsResult = mysqli_query($con,$getCatsQuery);
    while($row = mysqli_fetch_assoc($getCatsResult)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<li><a class='nav-link'  href='index.php?cat=$cat_id'>$cat_title</a></li>";
    }
}
function getBrands(){
    global $con;
    $getBrandsQuery = "select * from brands";
    $getBrandsResult = mysqli_query($con,$getBrandsQuery);
    while($row = mysqli_fetch_assoc($getBrandsResult)){
        $brand_id = $row['brand_id'];
        $brand_title = $row['brand_title'];
        echo "<li><a class='nav-link'  href='index.php?brand=$brand_id'>$brand_title</a></li>";
    }
}

function getProducts(){
    global $con;
    $getProductQuery= "";
    if(isset($_GET['cat'])){
        $cat_id = $_GET['cat'];
        $getProductQuery = "select * from products where pro_cat = '$cat_id'";
    }
    else if(isset($_GET['brand'])){
        $brand_id = $_GET['brand'];
        $getProductQuery = "select * from products where pro_brand = '$brand_id'";
    }
    else if(isset($_GET['search'])){
        $q = $_GET['search'];
        $getProductQuery = "select * from products where pro_keywords like '%$q%'";
    }
    else{
        $getProductQuery = "select * from products order by RAND()";
    }

    /*$getProductQuery = "select * from products order by RAND()";*/
    $getProductResult = mysqli_query($con,$getProductQuery);

    if(mysqli_num_rows($getProductResult)==0){
        echo "<h2>No Products in this Selected Criteria </h2>";
    }
    else {
        while ($row = mysqli_fetch_assoc($getProductResult)) {
            $title = $row['pro_id'];
            $price = $row['pro_price'];
            $image = $row['pro_image'];
            echo "
            <div class='col-sm-6 col-md-4 col-lg-3 text-center product-summary'>
                <h5 class='text-capitalize'> $title </h5>
                <img src='admin/product_images/$image'>
                <p> <b> Rs $price/-  </b> </p>
                <a href='#' class='btn btn-info btn-sm'>Details</a>
                <a href='#'>
                    <button class='btn btn-primary btn-sm'>
                        <i class='fas fa-cart-plus'></i> Add to Cart
                    </button>
                </a>
            </div>
            
            ";
        }
    }
}



