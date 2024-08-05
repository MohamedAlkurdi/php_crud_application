<?php
include("header.php");
include("dbconnection.php");

// Initialize $row to ensure it is defined
$row = null;

if (isset($_GET["product_id"])) {
    $id = $_GET["product_id"];
    $query = "SELECT * FROM `products` WHERE `product_id`='$id'";
    $result = mysqli_query($connection, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        die("Product not found or something went wrong...");
    }
} else {
    die("Product ID not specified...");
}
?>

<?php
if (isset($_POST['submit_update'])) {
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $origin = $_POST['origin_country'];

    $query = "UPDATE `products` SET `product_name` = '$pname', `price` = '$price', `stock` = '$stock', `origin_country` = '$origin' WHERE `product_id` = '$id';";
    $result = mysqli_query($connection,$query);
    if($result){
        header("location:index.php?update_message=you have successfully updated one row.");
    }else{
        die("update query was not executed correctly...");
    }
} else {
    echo "Update was not submitted.";
}
?>

<form class="p-6 bg-gray-300 rounded-lg w-3/5 flex flex-col items-center gap-6" action="update.php?product_id=<?php echo $id; ?>" method="post">
    <div class="w-full input_div flex flex-col">
        <label>Product Name</label>
        <input class="w-full border-1 border-black rounded-lg form-control" value="<?php echo htmlspecialchars($row["product_name"]); ?>" type="text" name="pname" required>
    </div>
    <div class="w-full input_div flex flex-col">
        <label>Price</label>
        <input class="w-full border-1 border-black rounded-lg form-control" value="<?php echo htmlspecialchars($row["price"]); ?>" type="number" name="price" required>
    </div>
    <div class="w-full input_div flex flex-col">
        <label>Stock</label>
        <input class="w-full border-1 border-black rounded-lg form-control" value="<?php echo htmlspecialchars($row["stock"]); ?>" type="number" name="stock" required>
    </div>
    <div class="w-full input_div flex flex-col">
        <label>Origin Country</label>
        <input class="w-full border-1 border-black rounded-lg form-control" value="<?php echo htmlspecialchars($row["origin_country"]); ?>" type="text" name="origin_country" required>
    </div>
    <input type="submit" class="w-[150px] text-center py-2 rounded-lg bg-blue-500 text-white hover:bg-blue-700 duration-200" name="submit_update" value="Update">
</form>

<?php
include("footer.php");
?>
