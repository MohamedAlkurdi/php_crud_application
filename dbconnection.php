<?php
const HOSTNAME = "localhost";
const USERNAME = "root";
const PASSWORD = "5732353";
const DATABASE = "crudDB";

$connection = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);

if(!$connection){
    echo "<h1 class='text-red-700 p-4 uppercase'>database connection failed.</h1> <br>";
    
}else{
    echo "<h1 class='text-green-700 p-4 uppercase'>connected to database successfully.</h1> <br>";
}
?>