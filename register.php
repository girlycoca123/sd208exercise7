<?php
        include "connection.php";

        if(isset($_POST['update'])){
            header('location: update.php?id='.$_POST['id']);
        }

        if(isset($_POST['delete'])){
            $sql_delete = "DELETE FROM `users` where id =". $_POST['id'];
        
            //check the query if it is executed well
        if(mysqli_query($conn, $sql_delete)){
            echo "";
        }else {
            echo "ERROR: ". mysqli_error($conn);
        }
        }
        $sql = "SELECT * FROM `users`";
    
        $result = mysqli_query($conn,$sql);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
  
    <link href='https://fonts.googleapis.com/css?family=Chicle' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
body{
    background-image:url("b.jpg");
    margin-top:10%;
    margin-left:20%;
    margin-right:20%;
}
</style>
</head>
<body>
    <div class="card container" >
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
           <?php
            if (mysqli_num_rows($result) > 0) {
                //output data each row
                while($row = mysqli_fetch_assoc($result)){
                    ?> 
                    <tr>
                        <td><?php  echo $row["id"]; ?> </td>
                        <td><?php  echo $row["lastname"]; ?> </td>
                        <td><?php  echo $row["firstname"]; ?> </td>
                        <td><?php  echo $row["email"]; ?> </td>
                        <td>
                            <form action="./register.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                <button type="submit" class="btn btn-outline-primary" name="update">Update</button>
                                <button type="submit" class="btn btn-outline-danger" name="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
            <?php
                }
            }else{              
                echo "";
            }
           ?>
        </tbody>
    </table></div>
</body>
</html>