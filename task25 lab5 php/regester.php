<?php
include "connect.php";

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $confirm = $_POST['confirm'];

    if($pass == $confirm){
        $sql = "INSERT INTO usersession(u_name,u_pass,u_confirm) 
        VALUES ('$name','$pass','$confirm')";

        $result = mysqli_query($conn, $sql);

        if(! $result ) {
            die("<br><br> Couldn't insert to table: " . mysqli_error($conn));
        }

        echo "<script>location = './index.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regester</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="regester">
    <h1>Regestration</h1>
    <div></div>
    
    <form action="<?php $_PHP_SELF ?>" method="POST">

        <h2>Name</h2>
        <input type="text" name="name" required>

        <h2>Password</h2>
        <input type="password" name="pass" required>

        <h2>Confirm Password</h2>
        <input type="password" name="confirm" required>

        <!-- if pass != confirm -->
        <?php
        if(isset($_POST['submit'])){
            if($pass != $confirm){
                echo "<h3 style='color:red;margin-bottom:-28px;text-align:center'>
                    it's not match with Password
                </h3>";
            }
        }?>
        
        <div class="btn">
            <input type="submit" value="Regester" name="submit">
            <input type="reset" value="Cancel" >
        </div>
        Already have an Account?<a href="./index.php"> Login here</a>
    </form>
    </div>
</body>
</html>

<?php mysqli_close($conn); ?>