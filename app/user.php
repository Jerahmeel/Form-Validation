
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/user.css">
  
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">Action</a>
                            </li>
                            <li>
                                <a href="#">Another action</a>
                            </li>
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

    <?php

        include('connection.php');
        session_start();  
        
        if(isset($_SESSION["username"]))  {  
            echo '<h3>Login Success, Welcome - '.$_SESSION["username"].'</h3>'; 
            echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';

            echo '<br /><br /><a href="logout.php">Logout</a>';  
        }  
        else  {  
            header("location:index.php");  
        } 

    ?>

    <div id="clockdate">
        <div class="clockdate-wrapper">
            <div id="clock"></div>
            <div id="date"></div>
        </div>
    </div>

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
        <button type="submit" id="btnin" name='btnin'  class="btn btn-success">Time-In</button>
        <button type="submit" id="btnout" name='btnout'  class="btn btn-danger">Time-Out</button>
   
    </div>

 <!-- </form> -->

<!-- Latest compiled and minified JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
        <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/user1.js"></script>  
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script> -->
</body>


</html>