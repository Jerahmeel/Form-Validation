<?php
    include('connection.php')
?>

<!DOCTYPE html>
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


<header>
      <!-- Static navbar -->
  <div class="container nav-cntainer">

    <!-- Static navbar -->
    <nav class="navbar navbar-default nav-cntents">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                    aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span id="openBtn" onclick="openNav()"><img src="assets/img/kestrellogo.png" alt=""></span>
            </div>
            <div id="navbar" class="navbar-collapse collapse">

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                         <?php
                            include('connection.php');
                            session_start();  
                            if(isset($_SESSION["username"]))  {  


                                $uname = $_SESSION["username"];
                                $db = mysqli_connect("localhost","root","","special_project");
                                $sql = "SELECT user_image FROM user_credentials where username='$uname' ";
                                $result = mysqli_query($db,$sql);
                        
                                while($row=mysqli_fetch_array($result)){
                                        echo '<input id="user_img" name="user_img" type="hidden" class="form-control" value="'.$row["user_image"].'" > '; 
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


                        </a>
                        <ul class="dropdown-menu">
                             <?php
                                echo '<li>';
                                    echo '<a href="logout.php">Logout</a>';
                                echo '</li>';
                                $uname = $_SESSION["username"];
                                $db = mysqli_connect("localhost","root","","special_project");
                                $sql = "SELECT username FROM user_credentials where username='$uname' ";
                                $result = mysqli_query($db,$sql);
                        
                                while($row=mysqli_fetch_array($result)){
                                    echo '<li>';
                                        echo "<a href='user_profile.php?view=".$row['username']." '>View Profile</a>";
                                    echo '</li>';
                                }
                            ?>

                            <li>
                                <a href="#">Something else here</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li>
                                <a href="#">Separated link</a>
                            </li>
                            <li>
                                <a href="#">One more separated link</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>

     

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
</div>



</header>




<body onload="startTime()">
    
<br><br><br><br>
        
    <div class="employee-modal ">
      <div id="clockdate">
        <div class="clockdate-wrapper">
            <div id="clock"></div>
            <div id="date"></div>
        </div>
    </div>
<br><br>
    
<div class="cont">  
        
        <?php
            $db = mysqli_connect("localhost","root","","special_project");
            $uname = $_SESSION["username"]; 
            $sql = "SELECT status FROM user_credentials where username='$uname'";
            $result = mysqli_query($db,$sql);
            
            while($row=mysqli_fetch_array($result)){
                echo"<input id='statusform' name='statusform' type='hidden' class='form-control' value='".$row['status']."'>";
            }
        ?>

        <input id="statusdummy" name="statusdummy" type="text" class="form-control">
        <input id="timein" name="timein" type="hidden" class="form-control"> 
        <input id="datein" name="datein" type="hidden" class="form-control"> 
        <input id="timeout" name="timeout" type="hidden" class="form-control"> 
        <input id="dateout" name="dateout" type="hidden" class="form-control">

        <br> <br>

     
       

</div>
    <br> <br>    <br> <br>
  



        <div class="container body-container">
            <div class="wrapper">
                <div class="cards">
                    <?php
                        $db = mysqli_connect("localhost","root","","special_project");
                        $sql = "SELECT * FROM user_credentials";
                        $result = mysqli_query($db,$sql);
                       
                        while($row=mysqli_fetch_array($result)){
                            echo "<div class=' card [ is-collapsed ] '>";
                            echo "<div class='custom-card card__inner'>";
                            echo "<span><img class='crd-img' src='".$row['user_image']."'width='100%' height='20%'></span>";
                            echo "<p><a href='profile.php?view=".$row['username']." '>".$row['username']."</p>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>

                    
     

                    <div class=' card [ is-collapsed ] '>
                        <div class='custom-card card__inner '>
                            <span><img id="add" src="assets/img/add.png" alt="" ></span>
                            <div class="sign-up">
                                <h5>Do not have an account yet?
                                    <a href="#" class="btn btn-link" id="sup">Sign Up</a>
                                </h5>
                            </div>
                            <i class='fa fa-folder-o'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
         <button type="submit" id="btnin" name='btnin'  class="btn btn-success">Time-In</button>
        <button type="submit" id="btnout" name='btnout'  class="btn btn-danger">Time-Out</button>
        <br><br>


           <textarea  id="ann" name="ann" type="text" class="form-control" placeholder="Type Here..." > </textarea>
           <br>
             <button type="submit" id="annpost" name='annpost'  class="btn btn-success">Post</button>
           <br><br><br><br><br>
    </div>

        

    <div class="modal-dialog sign-up-modal hide">
        <div class="modal-content">
            <div class="login-text">                     
                <h2>Sign Up</h2>
            </div>
            <div class="sign-up">
                <h5>already have an Account?<a href="#" class="btn btn-link" id="log-in">Log In</a></h5>
            </div>
            <div class="modal-body">
            <!-- form was here -->                 
                <form method="post" action="insert.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input id="fn" name="fn" type="text" class="form-control" placeholder="First Name" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input id="mn" name="mn" type="text" class="form-control" placeholder="Middle Name" />
                        </div>
                    </div>

                    <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                                <input id="ln" name="ln" type="text" class="form-control" placeholder="Last Name" />
                            </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-envelope"></span>
                            </span>
                            <input id="ea" name="ea" type="text" class="form-control" placeholder="Email Address" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-phone"></span>
                            </span>
                            <input id="cn" name="cn" type="text" class="form-control" placeholder="Contact Number" />
                        </div>
                    </div>  
                            
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input id="uname" name="uname" type="text" class="form-control" placeholder="Username" />
                        </div>
                    </div>
                
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                            <input type="text" id="rpassword" name="rpassword" class="form-control" placeholder="Password" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                            <input type="text" id="cpassword" name="cpassword" class="form-control" placeholder="Confirm Password" />
                        </div>
                    </div>   

                    <div class="form-group">
                        <div class="input-group">
                            <input type="hidden" id="status" name="status" class="form-control" />
                        </div>
                    </div>   

                    <input type="file" name="USERIMAGE" id="USERIMAGE" accept="assets/img/userimages/*" >   
                            
                    <div class="form-group text-center">
                        <button type="submit" id="signUpBtn" name='signUpBtn' class="btn btn-danger btn-lg login-button">Sign Up
                            <span class="glyphicon glyphicon-menu-right"></span>
                        </button>
                    </div>

                    <div class="form-group text-center">
                        <div class="input-group">
                            <select id="pos" name="pos">                      
                                <option value="Admin">Admin</option>
                                <option value="Employee">Employee</option>
                            </select>
                        </div>
                    </div>
                    
                </form>
            
                <div class="forget-pass">
                    <br><br> 
                </div>
            </div>
        </div>
    </div>



<!-- Latest compiled and minified JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
         <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
     <script type="text/javascript" src="assets/js/user1.js"></script>
    <script type="text/javascript" src="assets/js/admin.js"></script>
     <script type="text/javascript" src="assets/js/announce.js"></script>
   

    
<!-- 
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script> -->
</body>


</html>