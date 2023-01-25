<?php
include "confige.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="regester">
    <h1>User Registration Form</h1>
    <hr>
    <form action="<?php $_PHP_SELF ?>" method="POST">

        <!-- for Update -->
        <?php 
        include "editORview.php";
        ?>

        <h2>Name</h2>
        <input type="text" name="name" required value="<?php echo (isset($_GET['id']))? "$user_name": ""?>"><br>

        <h2>E-mail</h2>
        <input type="text" name="email" required value="<?php echo (isset($_GET['id']))? "$user_mail": ""?>"><br>

        <h2>Gender</h2>
        <input type="radio" name="gender" value="M"
        <?php if(isset($_GET['id'])){
            if($user_gender == 'M'){
                echo "checked";
            }
            else echo "";
        } else echo "";
        ?>>Male<br>

        <input type="radio" name="gender" value="F"
        <?php
        if(isset($_GET['id'])){
            if($user_gender == 'F'){
                echo "checked";
            }
            else echo "";
        } else echo "";
        ?>>Female<br>

        <input type="checkbox" name="status" 
        <?php 
        if(isset($_GET['id'])){
            if($user_status == 'Yes'){
                echo "checked";
            }
            else echo "";
        } else echo "";
        ?>>Recieve E-mail from us.<br>

        <input type="submit" value="Submit" name="submit" id="submit">
        <input type="reset" value="Cancel">
        <button><a href="./details.php">Details</a></button>

    </form>
    </div>

    <script>
        document.querySelector('#submit').addEventListener('click',function refreshPage(){
            window.location.reload();
        })
        
    </script>
</body>
</html>


<?php

if(isset($_POST['submit'])){

    if(empty($_POST['gender'])){
        $_POST['gender'] = "";
    }
    if(empty($_POST['status'])){
        $_POST['status'] = "No";
    }
    else{
        $_POST['status'] = "Yes";
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];

    if(! isset($_GET['id'])){ // no id in url => add
    
        $sql = "INSERT INTO users(u_name,u_mail,gender,mail_status) 
        VALUES ('$name','$email','$gender','$status' )";

        $useDB = mysqli_query( $conn, $sql );

        if(! $useDB ) {
            die("<br><br> Couldn't insert to table: " . mysqli_error($conn));
        }
 
        // echo "<br><br> Data inserted to table successfully\n";
    }
    else{
        // if(isset($_GET['id']))
        // exist id in url => if data is exist ==> update
        // include "editORview.php";
        $id = $_GET['id'];
        $sql = "UPDATE users 
        SET u_name = '$name' , u_mail = '$email' , gender = '$gender' , mail_status = '$status'
        WHERE u_id=$id"; 

        $result = mysqli_query($conn, $sql);

        if(! $result ) {
           die("<br><br> Couldn't update: " . mysqli_error($conn));
        }
 
        // echo "<br><br> Data updated successfully\n";
    }
}

mysqli_close($conn);

?>