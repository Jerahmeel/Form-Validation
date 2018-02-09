<?php
    require('connection.php');
  
    if(isset($_POST['signUpBtn'])){

        define("MAX_SIZE","1000");
        function getExtension($str){
            $i=strrpos($str,".");
            if(!$i){return "";}
            $l=strlen($str)-$i;
            $ext=substr($str,$i+1,$l);
            return $ext;

        }

        $error = 0;
        $userimage = $_FILES['USERIMAGE']['name'];
      
        if($userimage){
            $filename = stripslashes($_FILES['USERIMAGE']['name']);
            $extension = getExtension($filename);
            $extension = strtolower($extension);


            if(($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")
                && ($extension != "JPG") && ($extension != "JPEG") && ($extension != "PNG") && ($extension != "GIF"))

                {
                    echo'<h3> Unknown Extension </h3>';
                    $error=1;

                }

                else{
                    $size = filesize($_FILES['USERIMAGE']['tmp_name']);
                    if($size > MAX_SIZE*1024){

                        echo'<h4>You have exceeded the size limit</h4>';
                        $error=1;
                    }

                    $userimage=time().'.'.$extension;
                    $newname="assets/img/userimages/".$userimage;
                    
                    $copied = copy($_FILES['USERIMAGE']['tmp_name'], $newname);

                    if(!$copied){
                        echo '<h3>Copy Unsuccessful!</h3>';
                    }

                    else echo'';

                }
        }

        
    $firstName   =   $_POST['fn'];
    $middleName   =   $_POST['mn'];
    $lastName  =   $_POST['ln'];
    $emailAdd  =   $_POST['ea'];
    $contNum  =   $_POST['cn'];
    $userName  =   $_POST['uname'];
    $password  =   $_POST['rpassword'];


  $connection->query("INSERT INTO user_credentials (first_name, middle_name, last_name, email_address, contact_number, username, password, user_image) VALUES ('$firstName', '$middleName', '$lastName', '$emailAdd', '$contNum', '$userName','$password', '".$newname."')");

  header("Location:admin.php");

    }

  




    // $query = $connection->query("SELECT * FROM user_credentials WHERE `username`='$userName'");
    
    // while($x = $query->fetch()) {
    //     $cn = $x['username'];
    //     if(!empty($userName)){
    //         echo "Data is already in the database";
    //     }
    // }

    // if(empty($userName)){
    //     $connection->query("INSERT INTO user_credentials (first_name, middle_name, last_name, email_address, contact_number, username, password) VALUES ('$firstName', '$middleName', '$lastName', '$emailAdd', '$contNum', '$userName','$password')");
    // }
    
    
    
      

    ?>