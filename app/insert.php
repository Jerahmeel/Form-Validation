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
    $status =   $_POST['status'];
    $pos = $_POST['pos'];

    $connection->query("INSERT INTO user_credentials (first_name, middle_name, last_name, email_address, contact_number, username, password, user_image, status, position) VALUES ('$firstName', '$middleName', '$lastName', '$emailAdd', '$contNum', '$userName','$password', '".$newname."' ,'Out' , '$pos')");

    header("Location:admin.php");

}


//for user(time in - time out)
    $uname   =   $_POST['username'];
    $tin   =   $_POST['timein'];
    $din   =   $_POST['datein'];
    $stat   =   $_POST['statusform'];
    
    $connection->query("INSERT INTO time_in_out (user_name, time_in,date_in) VALUES ('$uname','$tin','$din')");

    $connection->query("UPDATE user_credentials set status='On Work' where username='$uname' ");

?>

    