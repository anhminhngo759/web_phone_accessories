<?php
    $mysqli = new mysqli("localhost","root","","webphukien");
    // Check connection
    if ($mysqli -> connect_errno) {
    echo "Lỗi kết nối SQL: " . $mysqli -> connect_error;
    exit();
    }
?>