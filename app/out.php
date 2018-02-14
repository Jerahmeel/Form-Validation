
<?php

    require('connection.php');

          $uname   =   $_POST['username'];
          
    $din   =   $_POST['datein'];
      $tout   =   $_POST['timeout'];
    $dout   =   $_POST['dateout'];
   $stat   =   $_POST['status'];

    
        
  $connection->query("UPDATE time_in_out set time_out='$tout' , date_out='$dout' where user_name='$uname' && date_in='$din'");
$connection->query("UPDATE user_credentials set status='Out' where username='$uname' ");

?>