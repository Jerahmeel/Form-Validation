<!DOCTYPE html>
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
            <div class="sign-up">
                <h5>Do not have an account yet?<a href="#" class="btn btn-link" id="su">Sign Up</a></h5>
            </div>
            <div class="modal-body">
                <form action="" role="form">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input type="text" class="form-control" placeholder="Username" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-lock"></span>
                            </span>
                            <input type="password" class="form-control" placeholder="Password" />
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-danger btn-lg login-button">Login
                                <span class="glyphicon glyphicon-menu-right"></span>
                        </button>
                    </div>
                    <div class="forget-pass">
                            <br><br>
                            <a href="#" class="btn btn-link">Forgot Password</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal-dialog sign-up-modal hide">
        <div class="modal-content">
            <div class="login-text">                     
                <h2>Sign Up</h2>
            </div>
            <div class="sign-up">
                    <h5>already have an Account?<a href="#" class="btn btn-link" id="li">Log In</a></h5>
                </div>
            <div class="modal-body">
                    <!-- form was here -->
                    
<form method="post" action="php/insert.php" enctype="multipart/form-data">


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

                        <input type="file" name="USERIMAGE" id="USERIMAGE" accept="userimages/*" >   
                            

                            <div class="form-group text-center">
                                <button type="submit" id="signUpBtn" name='signUpBtn' class="btn btn-danger btn-lg login-button">Sign Up
                                        <span class="glyphicon glyphicon-menu-right"></span>
                                </button>
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
</body>
</html>