<?php 
    include "editORview.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="view">
    <h1>View Record</h1>
    <hr>
    <h3>Name</h3>
    <p>
        <?php echo  $user_name; ?>
    </p>

    <h3>Email</h3>
    <p>
        <?php echo  $user_mail; ?>
    </p>

    <h3>Gender</h3>
    <p>
        <?php echo  $user_gender; ?>
    </p>

    <p>
        <?php 
        if($user_status == 'Yes'){
            echo "you will recieve Emails from us";
        }
        else echo "";
        ?>
    </p>

    <button><a href="details.php" style="all:unset">Back</a></button>
    </div>
</body>
</html>