<?php
include("dbconnection.php");
if(isset($_POST['add_product'])){
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $origin_country = $_POST['origin_country'];

    $invalid_name = $pname == "" || empty($pname);
    $invalid_price = $price == "" || empty($price);
    $invalid_stock = $stock == "" || empty($stock);
    $invalid_origin = $origin_country == "" || empty($origin_country);


    if($invalid_name || $invalid_price || $invalid_stock || $invalid_origin){
        header('location:index.php?message=suck on your bad inputs.');
    }
    else{
        $query = "INSERT INTO `products` (`product_name`, `price`, `stock`, `origin_country`) VALUES ('$pname', '$price', '$stock', '$origin_country')";
        $result = mysqli_query($connection, $query);
        if($result){
            header('location:index.php?insert_message=Your product has been added successfully.');
        }else{
            die("inserting data was not seuccesfull...");
        }
    }
}
?>