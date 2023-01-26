<?php
session_start();

include "connect.php";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $pass = $_POST['pass'];

    $sql = "SELECT *
    FROM usersession
    WHERE u_name = '$name'
    and u_pass = '$pass' ";

    $result = mysqli_query($conn,$sql);
    if(! $result) die("<br><br> Couldn't select from table: " . mysqli_error($conn));

    if( mysqli_num_rows($result) > 0){

        $_SESSION['userName'] = $name; // $_SESSION[anything] ==> (anything) i will use it in another pages
        echo '<script>location = "./view.php"</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="regester login">
    <h1>Login</h1>
    <div></div>
    
    <form action="<?php $_PHP_SELF ?>" method="POST">

        <h2>Name</h2>
        <input type="text" name="name" required>

        <h2>Password</h2>
        <input type="password" name="pass" required>

        <!-- if name or password not exist in db -->
        <?php if(isset($_POST['submit'])){
            if(! (mysqli_num_rows($result) > 0) )
            {echo "<h3 style='color:red;margin-bottom:-26px;text-align:center'>
                    Not valid Name Or Password
                </h3>";}
        }?>

        <div class="btn">
            <input type="submit" value="Login" name="submit">
        </div>
        Don't have an Account?<a href="./regester.php"> Sign up now</a>
    </form>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>