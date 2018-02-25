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
         
           if(empty($_POST["username"]))  
           {  
                $message = '<label>All fields are required</label>';  
                echo '<script type="text/javascript"> alert("All fields are required!") </script>';
           } 

            if(!empty($_POST["username"]))  
           {  
                $query = "SELECT * FROM user_credentials WHERE username = :username ";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'username'     =>     $_POST["username"]  
                          
                           
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                    $_SESSION["username"] = $_POST["username"]; 
               
                   
                    header("location:login.php");  

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
  

               
            



<!-- Trigger the modal with a button -->


<!-- Modal -->





    <div id="retrieve"></div>

    <!-- <div class="row top-row">
      
     

   <?php
                        // $db = mysqli_connect("localhost","root","","special_project");
                        // $sql = "SELECT * FROM user_credentials";
                        // $result = mysqli_query($db,$sql);
                       
                        // while($row=mysqli_fetch_array($result)){
                         
                        //     echo "<div class='floating-box'>";
                        //     echo "<img id='card-image' src='".$row['user_image']."'>";
                        //     echo "<p>".$row['username']."</p>";
                        //     echo "</div>";
                          
                        // }
                    ?> 
                    <div> -->

<div class="row main-row">
        <div class="col-sm-8 log-box">
  
   


   <?php
 
                        $db = mysqli_connect("localhost","root","","special_project");
                        $sql = "SELECT * FROM user_credentials";
                        $result = mysqli_query($db,$sql);
                       
                        while($row=mysqli_fetch_array($result)){
                            echo"<form action='index.php' method='post' role='form'>";
                         
                            echo "<div class='user-img'>";
                       echo " <button type='submit' class='login' name='login'  class='btn btn-success'  ><img  src='".$row['user_image']."'></button>";
                            // echo "<img  src='".$row['user_image']."'>";
                            // echo"<a href='index.php?view=".$row['username']." '><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal'><img  src='".$row['user_image']."'></button></a>";
                            // echo"<button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal'><img  src='".$row['user_image']."'></button>";
                    //    echo "<a href='login.php?view=".$row['username']." '><img  src='".$row['user_image']."'></a>";
                         
                             echo"<input class='username' name='username' type='text' class='form-control' value='".$row['username']."'>";
                            // echo "<p >".$row['username']."</p>";

                            echo "</div>";
                            echo"</form>";
                          
                        }
                    ?> 

          
<!-- 
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
                <form action="index.php" method="post" role="form">

              


                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-user"></span>
                            </span>
                            
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username" />
                        </div>
                    </div>

                    -->



 <?php
                        //$uname = "hahahaha";
                        // $uname = $_GET['view'];
                        // $db = mysqli_connect("localhost","root","","special_project");
                        // $sql = "SELECT * FROM user_credentials where username='$uname'";
                        // $result = mysqli_query($db,$sql);
                        // while($row=mysqli_fetch_array($result)){
                            
                            
                           //echo"<input type='hidden' id='username' name='username' class='form-control' value=''  />";
                            // echo"<div id='myModal' class='modal fade' role='dialog'>";
                            // echo"<div class='modal-dialog'>";

                              
                            //     echo"<div class='modal-content'>";
                            //     echo"<div class='modal-header'>";
                            //         echo"<button type='button' class='close' data-dismiss='modal'>&times;</button>";
                            //         echo"<h4 class='modal-title'>Modal Header</h4>";
                            //     echo"</div>";
                            //     echo"<div class='modal-body'>";
                                //   echo"<input type='hidden' id='username' name='username' class='form-control' value='".$row['username']."'  />";
                            //     echo"</div>";
                            //     echo"<div class='modal-footer'>";
                            //         echo"<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
                            //     echo"</div>";
                            //     echo"</div>";

                            // echo"</div>";
                            // echo"</div>";

                        // }
                    ?>





                    <!-- <div class="form-group">
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
    </div> -->

    





    <!-- </div> -->
</div>

 <div class="col-sm-4 rem-box">
     <!-- <div class="board"> -->
       
        <p id="rem">REMINDERS:</p>
         <?php
     
        $db = mysqli_connect("localhost","root","","special_project");
        $sql = "SELECT * FROM announcement ";
        // $sql = "SELECT user_image FROM user_credentials  where username='$uname' ";
        $result = mysqli_query($db,$sql);
                        
        while($row=mysqli_fetch_array($result)){


            echo '<div class="ann-card">';
            echo'<img class="ann-img" src="'.$row['user_image'].'" width="10%" height="10%" />';
            echo '<p id="ann_name">'.$row["username"].'</p>';
            echo '<p  id="ann_msg">'.$row["announcement"].'</p>';
            echo '</div>';
        }
        ?>
       

    <!-- </div> -->
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