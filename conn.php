<?php
    $hostname = "localhost";
    $SarawakID = "root";
    $Password = "";
    $database = "bookbear";

    $connection = mysqli_connect($hostname, $SarawakID, $Password)
    or die ("Could not connect to MySQL" .mysqli_error($connection));
    mysqli_select_db($connection, $database) or die("Could not select the database");
?>