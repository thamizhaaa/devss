    <?php 
        ob_start();
        include "includes/config.php";
        error_reporting(0);
        $username = $_POST['uname'];
        $password = $_POST['pass_word'];		
        if(($username != "") && ($password != ""))
        {						
                $result = mysql_query("SELECT id,status FROM seeker_personal WHERE loginid ='$username' and pass ='$password'");	
                $row = mysql_fetch_array($result);
                $status =$row['status'];
                $count=mysql_num_rows($result);
                if(($count == 1) && ($status == 1))
                {
                    session_start();
					$_SESSION['login_seek']=$username;
                    echo 0;
                }				
				else if(($count == 1) && ($status == 0))
                {
                    //session_start();
					//$_SESSION['login_seek']=$username;                 
					echo 1;
                }
				else if(($count == 0))
                {
					echo 2;
                }
				else
				{                 
					echo 3;
                }               
        }
    ?>




