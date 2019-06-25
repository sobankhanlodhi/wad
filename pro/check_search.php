<?php
require_once "server/db_connection.php";
$search = $_GET['search'];
$sel_search = "select * from products where pro_title like '%$search%'";
$sel_result = mysqli_query($con,$sel_search);
if(mysqli_num_rows($sel_result) > 0){
    /*echo "<i> Already Taken </i>";*/
    echo print_r($sel_result);
}