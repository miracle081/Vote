<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dataBase = 'voteing';
    $connection = mysqli_connect($server,$username,$password,$dataBase);

    if (!$connection) {
      die("Something went wrong".mysqli_connect_error());
    }