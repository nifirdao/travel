<?php


try{
    //host
    define("HOST", "localhost");

    //dbname
    define("DBNAME", "travel");

    //username
    define("USER", "root");

    //pas
    define("PASS", ""); 

    $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // if($conn == true) {
    //   echo "db connection is success";
    // } else {
    //   echo "error";
    // }
} catch( PDOException $Exception ) {
    echo $Exception->getMessage();
}