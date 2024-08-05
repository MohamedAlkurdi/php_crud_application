<?php
include("dbconnection.php");
if($_GET["product_id"]){
$id = $_GET["product_id"];

$query = "DELETE FROM `products` WHERE `product_id`='$id'";
$result = mysqli_query($connection,$query);
if($result){
    header("location:index.php?delete_message=you have deleted one row successfully.");
}else{
    die("delete was not performed.");
}
}
?>
