<?php
function doDB() {
    global $mysqli;
    
    $mysqli = mysqli_connect("127.0.0.1", "root", "123456", "ch16");
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
}
?>