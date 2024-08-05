<?php
        $query = "SELECT * FROM products";
        $result = mysqli_query($connection, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($columns as $column) {
                    if ($column == "delete") {
                        echo "<td class='border border-gray-300 p-4'><a class='px-4 py-2 rounded-lg bg-red-500 text-white hover:no-underline hover:bg-red-700 duration-200' href='delete.php?product_id={$row['product_id']}'>Delete</a></td>";
                    } elseif ($column == "update") {
                        echo "<td class='border border-gray-300 p-4'><a class='px-4 py-2 rounded-lg bg-blue-500 text-white hover:no-underline hover:bg-blue-700 duration-200' href='update.php?product_id={$row['product_id']}'>Update</a></td>";
                    } else {
                        echo "<td class='border border-gray-300 p-4'>{$row[$column]}</td>";
                    }
                }
                echo "</tr>";
            }
        } else {
            die("Something went wrong while fetching data");
        }
        ?>