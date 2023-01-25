<?php
include "confige.php";

// for show all data from database
// $sql_select = "SELECT u_id,u_name,u_mail,gender,mail_status FROM users";
// ORRRRRRRRR
$sql_select = "SELECT * FROM users";

mysqli_select_db( $conn, $dbname);
$exc_query = mysqli_query( $conn, $sql_select);

if(! $exc_query ) {
    die("<br><br> Couldn't get data: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="details">
    <div class="info">
        <h1>User Details</h1>
        <button><a href="./regester.php">Add New User</a></button>
    </div>
    <hr>
    <table border=1>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Mail Status</th>
                <th>Action</th>
            </tr>
            <?php
            if( mysqli_num_rows($exc_query) > 0){
                $i = 1; // to make id column not depend on id of db because it is auto increment
                while($row = mysqli_fetch_assoc($exc_query)){ // associative array
            
                    echo "
                            <tr>
                                 <td>";?>
                                <?php echo $i++; ?> 
                                <?php
                                echo "
                                </td>
                                <td>{$row['u_name']} </td>
                                <td>{$row['u_mail']}</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['mail_status']}</td>
                                <td>
                                    <a href='view.php?id={$row["u_id"]}'><img src='./img/view.png' alt=''></a>
                                    <a href='regester.php?id={$row["u_id"]}'><img src='./img/edit.png' alt=''></a>
                                    <a href='details.php?id={$row["u_id"]}'><img src='./img/delete.png' alt=''></a>
                                </td>
                            </tr>
                    ";
                }
            }
            else{
                echo "0 results";
            }
            
            ?>
        </thead>
    </table>
    </div>
    
    <script>
        // color of rows
        let rows = document.querySelectorAll('tr');
        rows.forEach((i,index)=>{
            if(!(index % 2 == 0)){ // odd rows     
              i.style.backgroundColor = "#edeaea78";
            }
        });
    </script>
</body>
</html>


<?php
// delete
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM users
    WHERE u_id = $id";

    $result = mysqli_query($conn, $sql);

    if(! $result ) {
       die("<br><br> Couldn't delete: " . mysqli_error($conn));
    }

    // echo "<br><br> Data deleted successfully\n";
}

mysqli_close($conn);
?>