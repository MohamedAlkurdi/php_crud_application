<?php
if(isset($_GET['message'])){
    echo "<h3 class='text-blue-700 font-bold uppercase p-4'>".$_GET['message']."</h3> <br>";
}
if(isset($_GET['insert_message'])){
    echo "<h3 class='text-blue-700 font-bold uppercase p-4'>".$_GET['insert_message']."</h3> <br>";
}
if(isset($_GET['update_message'])){
    echo "<h3 class='text-blue-700 font-bold uppercase p-4'>".$_GET['update_message']."</h3> <br>";
}
if(isset($_GET['delete_message'])){
    echo "<h3 class='text-blue-700 font-bold uppercase p-4'>".$_GET['delete_message']."</h3> <br>";
}
?>