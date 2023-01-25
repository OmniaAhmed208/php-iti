<?php

$servername = "localhost";
$username = "root";
$password = '';
$dbname = 'users';

$conn = mysqli_connect( $servername, $username, $password, $dbname);

if( ! $conn ){
    die("No Connection:" . mysqli_error($conn));
}

// echo "Connected Successfully";


// //______Create database_______
// $sql = "create database $dbname";

// //______Execute query code________ 
// $useDB = mysqli_query( $conn, $sql);
// if( ! $useDB ){
//     die("couldn't create database: ". mysqli_error($conn));
// }

// //______Use database______
// mysqli_select_db( $conn, $dbname);
// echo "<br>Database created: <span style='color:red'>$dbname</span>";


// Create Table
// $sql = 'CREATE TABLE users( u_id INT NOT NULL AUTO_INCREMENT,
//    u_name VARCHAR(20) NOT NULL,
//    u_mail VARCHAR(20) NOT NULL,
//    gender ENUM("M","F") NOT NULL,
//    mail_status ENUM("Yes","No") NOT NULL,
//    primary key ( u_id ))';

// $useDB = mysqli_query( $conn, $sql);
// if(! $useDB){
//     die("couldn't create table: ". mysqli_error($conn));
// }

// echo "<br> table created :)";



// mysqli_close($conn); ==> i will close it in day4 page
?>