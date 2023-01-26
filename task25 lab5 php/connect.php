<?php

$conn = mysqli_connect('localhost','root','','users');

if( ! $conn ){
    die("No Connection:" . mysqli_error($conn));
}

// echo "Connected Successfully";

// ___________ create table into user database_____________
// $sql = "CREATE TABLE userSession(u_id INT NOT NULL AUTO_INCREMENT,
// u_name VARCHAR(20) NOT NULL,
// u_pass VARCHAR(20) NOT NULL,
// u_confirm VARCHAR(20) NOT NULL,
// primary key ( u_id ))";

// $result = mysqli_query($conn,$sql);
// if(! $result){
//     die("couldn't create table: ". mysqli_error($conn));
// }
// echo "<br> table created :)"; 


// mysqli_close($conn);
?>