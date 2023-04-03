<?php
    $MYSQL_ADDON_HOST = getenv('MYSQL_ADDON_HOST');
    $MYSQL_ADDON_PORT = getenv('MYSQL_ADDON_PORT');
    $MYSQL_ADDON_DB = getenv('MYSQL_ADDON_DB');
    $MYSQL_ADDON_USER = getenv('MYSQL_ADDON_USER');
    $MYSQL_ADDON_PASSWORD = getenv('MYSQL_ADDON_PASSWORD');
    $MYSQL_ADDON_URI = getenv('MYSQL_ADDON_URI');

    echo $MYSQL_ADDON_URI . "\n";

    // Kết nối đến MySQL
    $conn = mysqli_connect($MYSQL_ADDON_HOST, $MYSQL_ADDON_USER, $MYSQL_ADDON_PASSWORD, $MYSQL_ADDON_DB);

    // Kiểm tra kết nối
    if ($conn === false) {
        die("\n\nERROR: Could not connect. " . mysqli_connect_error());
    }

    // Tạo bảng users
    $sql = "CREATE TABLE users (
    id VARCHAR(10) NOT NULL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
    )";
    if (mysqli_query($conn, $sql)) {
        echo "\n\nTable created successfully.";
    } else {
        echo "\n\nERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
?>
