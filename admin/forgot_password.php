<?php include('../lib/Session.php');
//Session::init();

//Jodi login kora thake taile direct index.php te dhukbe thats y use that method
Session::checkLogin();

?>

<?php include('../config/config.php'); ?>
<?php include('../lib/Database.php'); ?>

<?php include('../helpers/Format.php'); ?>

<?php
 $db = new Database();
 $format = new Format();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
            
<?php

            
    if(isset($_POST['submit']))
    {
        
        $email = $format->validation($_POST['email']);
        $email = mysqli_real_escape_string($db->link ,$email);
        
//For validite check
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            echo "<span style='color:red;font-size:18px'>Invalid Email Address</span>";
        }
        else
        {
            $emailSql = "SELECT * FROM tbl_user WHERE email = '$email' limit 1";
            $checkEmail = $db->select($emailSql);
            
            if($checkEmail != false)
            {
               while($value = $checkEmail->fetch_assoc())
               {
                   $userid = $value['id'];
                   $username = $value['username'];
               }
               
                   $text = substr($email, 0, 3);
                   $random = rand(10000,99999);
                   $newpassword = "$text$random";
                   $password = md5($newpassword);
                   
                   
                   $sql = "UPDATE tbl_user
                           SET
                           password = '$password'
                           WHERE id= '$userid'    
                               ";
                   $updated_row = $db->update($sql);
                   
                   $to = $email;
                   $from = "bahlul.tausif@gmail.com";
                   $headers = "From: $from\n";
                   
                   $headers .="MIME-Version: 1.0" . "\r\n";
                   $headers .="Content-type: text/html; charset=UTF-8" . "\r\n";
                   $subject = "Your Password";
                   $message = "Your Username is ".$username."Password is ".$newpassword."Please visit email to login";
                           
                   $sendEmail = mail($to, $subject, $message,$headers);
                   
                   if($sendEmail)
                   {
                       echo "<span style='color:green;font-size:18px'>Please check your email for new password</span>";
                   }
                   else
                   {
                       echo "<span class='error'>Email not send</span>";
                   }
            }
            else
            {
               echo "<span style='color:red;font-size:18px'>Email not Exist</span>";
            }
        
        }
            

    }
?>

            
            <form action="" method="post">
			<h1>Password Recovery</h1>
			<div>
                            <input type="text" name="email" placeholder="Enter Valid Email Address" required=""/>
			</div>
			
			<div>
                            <input type="submit" name="submit" value="Send Email" />
			</div>
		</form><!-- form -->
                
                <div class="button">
                    <a href="login.php">Log in</a>
		</div><!-- button -->
                
		<div class="button">
			
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>

