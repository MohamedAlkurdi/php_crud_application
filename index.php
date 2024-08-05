<?php
include("header.php");
include("dbconnection.php");
?>
<h1 class="text-4xl mb-8 p-8">Simple PHP CRUD Project</h1>
<button type="button" class="text-white px-4 py-2 rounded-lg bg-green-500 border-none hover:bg-green-700 duration-200" data-toggle="modal" data-target="#exampleModal">
    Add a product
</button>

<?php
include("insertion_modal.html");
?>

<table class="w-4/5 text-center border-collapse mt-12">

    <?php
    $query = "SELECT * FROM products LIMIT 1";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $columns = array_keys(mysqli_fetch_assoc($result));
        $columns[] = "delete";
        $columns[] = "update";
        mysqli_data_seek($result, 0);
    ?>
        <thead class="bg-gray-200">
            <tr>
                <?php
                foreach ($columns as $column) {
                    echo "<th class='border border-gray-300 p-4'>" . ucfirst(str_replace('_', ' ', $column)) . "</th>";
                }
                ?>
            </tr>
        </thead>
    <?php
    } else {
        die("Something went wrong while fetching columns");
    }
    ?>
    <tbody>
        <?php
        include("fetch_products.php");
        ?>
    </tbody>
</table>

<?php
include("operations_messages.php");
include("footer.php");
?>