<?php
if(isset($_GET['del_category'])){
    $del_id = $_GET['del_category'];
    $del_cat = "delete from categories where cat_id='$del_id'";
    $run_del = mysqli_query($con,$del_cat);
    if($run_del){
        header('location: index.php?view_categories');
    }
}