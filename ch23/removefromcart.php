<?php
session_start();

if (isset($_GET['id'])) {
    $mysqli = mysqli_connect("127.0.0.1", "root", "123456", "ch16");
    
    $safe_id = mysqli_real_escape_string($mysqli, $_GET['id']);
    $delete_item_sql = "DELETE FROM store_shoppertrack WHERE id = '".$safe_id."' and session_id = '".$_COOKIE['PHPSESSID']."'";
    $delete_item_res = mysqli_query($mysqli, $delete_item_sql) or die(mysqli_error($mysqli));
    
    mysqli_close($mysqli);
    
    header("Location: showcart.php");
    exit();
} else {
    header("Location: seestore.php");
    exit();
}