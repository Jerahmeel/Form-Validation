<!DOCTYPE html>
<?php
session_start();  
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "special_project";  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password );  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
                echo '<script type="text/javascript"> alert("All fields are required!") </script>';
           } 

            if(!empty($_POST["username"]) || !empty($_POST["password"]))  
           {  
                $query = "SELECT * FROM user_credentials WHERE username = :username AND password = :password AND position = 'Employee' ";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     $_POST["password"]  
                          
                           
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                    $_SESSION["username"] = $_POST["username"]; 

                    header("location:user.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                     echo '<script type="text/javascript"> alert("Wrong Data!") </script>';
                }  
           } 

           if(!empty($_POST["username"]) || !empty($_POST["password"]))  
           {  
                $query = "SELECT * FROM user_credentials WHERE username = :username AND password = :password AND position = 'Admin' ";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     $_POST["password"]  
                          
                           
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                    $_SESSION["username"] = $_POST["username"]; 

                    header("location:admin.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                     echo '<script type="text/javascript"> alert("Wrong Data!") </script>';
                }  
           }
           
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Kestrel-DDM</title>
</head>
<body>
    <div class="logo">
        <img src="assets/img/kestrellogo.png" alt="">
    </div>

    <div id="retrieve"></div>

    <div class="modal-dialog login-in-modal">
        <div class="modal-content">
            <div class="login-text">                     
                <h2>Login</h2>
            </div>
            <div class="modal-body">
                <form action="index.php" method="post" role="form">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input type="text" name="username" class="form-control" placeholder="Username" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-lock"></span>
                            </span>
                            <input type="password" name="password" class="form-control" placeholder="Password" />
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" name="login" class="btn btn-danger btn-lg login-button">Login
                                <span class="glyphicon glyphicon-menu-right"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    </div>
    <!-- Latest compiled and minified JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</body>
</html>