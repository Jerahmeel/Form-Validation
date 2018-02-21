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
                                echo '<p>'.$_SESSION["username"].'</p>'; 
                                // echo'<span class="caret"></span>';
                                echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
                                // echo '<br /><br /><a href="logout.php">Logout</a>';  
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
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
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

<body>
    <div class="employee-modal ">
        <div class="container body-container">
            <div class="wrapper">
                    <?php
                        $uname = $_GET['view'];
                        $db = mysqli_connect("localhost","root","","special_project");
                        $sql = "SELECT * FROM user_credentials where username='$uname'";
                        $result = mysqli_query($db,$sql);
                        while($row=mysqli_fetch_array($result)){
                            echo"<div class=' card [ is-collapsed ] '>";
                            echo"<div class='custom-card card__inner'>";
                            echo"<span><img class='crd-img' src='".$row['user_image']."'width='100%' height='20%'></span>";
                            echo"<p> ".$row['first_name']."</p>";
                            echo"</div>";
                            echo"</div>";
                            echo"<p> ".$row['email_address']."</p>";
                            echo"<p> ".$row['contact_number']."</p>";
                            echo"<p> ".$row['status']."</p>";
                        }
                    ?>
            </div>
        </div>  
    </div>

    <div class="employee-modal ">
        <div class="container body-container">
            <?php
                $uname = $_GET['view'];
                $db = mysqli_connect("localhost","root","","special_project");
                $sql = "SELECT * FROM time_in_out where user_name='$uname'";       
                $result = mysqli_query($db,$sql);    
                while($row=mysqli_fetch_array($result)){      
                    echo"<p> Date--------".$row['date_in']."</p> ";
                    echo"<p> Time In-----".$row['time_in']."</p>"; 
                    echo"<p> Time Out----".$row['time_out']."</p> <br><br>";          
                }
            ?> 
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
    
<!-- 
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script> -->
</body>


</html>