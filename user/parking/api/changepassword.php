 <?php
require '../class/myclass.php';

connection_open();



if(isset($_POST['email'])  &&  isset($_POST['opassword'])  &&  isset($_POST['npassword'])  &&  isset($_POST['cpassword'])) 
{
    
    $jsonarray=array(); 
    $uname = mysql_real_escape_string($_POST['email']);
    $opass = mysql_real_escape_string($_POST['opassword']);
    $npass = mysql_real_escape_string($_POST['npassword']);
    $cpass = mysql_real_escape_string($_POST['cpassword']);
    
       
    $q = mysql_query("SELECT `user_password` FROM `user` WHERE `user_email`='{$uname}'") or die(mysql_error());

    $data = mysql_fetch_row($q);
    if ($data[0] == $opass) 
        {
        if ($npass == $cpass) 
            {

            $q = mysql_query("UPDATE `user` SET `user_password`='{$npass}'"
            . "WHERE `user_email`='{$uname}'") or die(mysql_error());

            if ($q) 
                {
                  $jsonarray['"success"']='Password Change Successfully';
                }
        
            }    
              else {
                    $jsonarray['"message"']='New Password and Confirm Password not Match';
                    }
        }
        else {
                $jsonarray['"message"']='Old Password not Match';
             }
    
    
    echo json_encode($jsonarray); 
}