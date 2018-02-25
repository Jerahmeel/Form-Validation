<!DOCTYPE html>

<?php
  


 error_reporting(0);
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

            if(!empty($_POST["username"])  || empty($_POST["password"]))  
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
                    
                         $_SESSION["password"] = $_POST["password"]; 
                   
                           
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
                      $_SESSION["password"] = $_POST["password"]; 
                     
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
     <link rel="stylesheet" href="assets/css/admin.css">
    <title>Kestrel-DDM</title>
</head>
<body>
    


 




    <div id="retrieve"></div>


              <div class="logo">
        <img src="assets/img/kestrellogo.png" alt="">
    </div>

    



<div class="main-container">
            
    <div class="modal-dialog login-in-modal" id="logincont">
        <div class="modal-content">
            <div class="login-text">                     
                <h2>Login</h2>
            </div>

        
            
            <div class="modal-body">
                <form action="login.php" method="post" role="form">

              
                   



 <?php

          
         
                        
                    //     $db = mysqli_connect("localhost","root","","special_project");
                    //     $sql = "SELECT * FROM user_credentials where username='$uname'";
                    //     $result = mysqli_query($db,$sql);
                    //     while($row=mysqli_fetch_array($result)){
                            
                    //      echo"<div class='form-group'>";
                    //     echo"<div class='input-group'>";
                    //         echo"<span class='input-group-addon'>";
                    //         echo"<span class='glyphicon glyphicon-lock'></span>";
                    //         echo"</span>";
                    //         echo"<input type='text' id='username' name='username' class='form-control' value='".$row['username']."'  />";
                    //     echo"</div>";
                    // echo"</div>";

                    //     }

                    include('connection.php');
                            session_start();  
                            if(isset($_SESSION["username"]))  {  
                                    

                                $uname = $_SESSION["username"];
                                $db = mysqli_connect("localhost","root","","special_project");
                                $sql = "SELECT user_image FROM user_credentials where username='$uname' ";
                                $result = mysqli_query($db,$sql);
                        
                                while($row=mysqli_fetch_array($result)){
                                        echo "<p><img class='crd-img' src='".$row['user_image']."'width='10%' height='10%'></p>";
                                         echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
                                }



                                // echo '<p>'.$_SESSION["username"].'</p>'; 
                                // // echo'<span class="caret"></span>';
                                // echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
                                // // echo '<br /><br /><a href="logout.php">Logout</a>';  
                            }  
                            else  {  
                                header("location:index.php");  
                            } 
                    



                    ?>





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
       <script type="text/javascript" src="assets/js/login.js"></script> 
</body>
</html>