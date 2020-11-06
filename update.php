<?php
    include "connection.php";
    if(isset($_GET["id"])){
        $sql = "SELECT * FROM users WHERE id=".$_GET['id'];
    $result = mysqli_query($conn, $sql);
    $user =  mysqli_fetch_assoc($result);
    }
    
    if(isset($_POST["submit"])){
        $lname = $_POST["lastname"];
        $fname = $_POST["firstname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        //define the sql query
        $sql_update = "UPDATE users SET lastname='".$lname."', firstname='". $fname."',email='".$email."',password='".$password . "' where id=".$_POST["id"];

        //check the query if it is executed well
        if(mysqli_query($conn, $sql_update)){
            echo "Updated new row";
            header('location: ./register.php ');
        }else {
            echo "ERROR: ". mysqli_error($conn);
          
        }
    } 
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Form</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
        <title>Registration</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Amarante' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="style.css">

    </head>

    <body>
        <div class="signup-form">
            <form action="update.php" method="POST">
                <h2>Update</h2>
                <input type="hidden" name="id" value="<?php echo $user["id"]; ?>">
                <div class="form-group">
                    <p>Lastname</p>
                    <input type="text" class="form-control" name="lastname" value="<?php echo $user["lastname"];?>" required>
                </div>
                <div class="form-group">
                    <p>Firstname</p>
                    <input type="text" class="form-control" name="firstname" value="<?php echo $user["firstname"]?>" placeholder="Enter Firstname" required>
                </div>
                <div class="form-group">
                    <p>Email Address</p>
                    <input type="email" class="form-control" name="email" value="<?php echo $user["email"]?>"placeholder="Enter Email Address" required>
                </div>
                <div class="form-group">
                    <p>Password</p>
                    <input type="password" class="form-control" name=" password" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" value="update" class="btn btn-success btn-lg btn-block">Update Now</button>
                </div>
            </form>
        </div>
    </body>

    </html>