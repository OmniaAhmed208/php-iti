<?php

include "confige.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $sql_search = "SELECT * FROM users WHERE u_id=$id";

    $res = mysqli_query($conn,$sql_search);
    if(! $res ) {
        die("<br><br> Couldn't insert to table: " . mysqli_error($conn));
    }
    // echo "selected";
   
    if(mysqli_num_rows($res)>0){

        $user = mysqli_fetch_assoc($res);
        $user_name = $user['u_name'];
        $user_mail = $user['u_mail'];
        $user_gender = $user['gender'];
        $user_status = $user['mail_status'];
    }
    else echo "0 result";
}
else{
    // echo "Error ";
}

?>