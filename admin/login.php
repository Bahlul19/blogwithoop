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
        $username = $format->validation($_POST['username']);
        $password = $format->validation(md5($_POST['password']));

        $username = mysqli_real_escape_string($db->link,$username);
        $password = mysqli_real_escape_string($db->link ,$password);

        $sql = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";

        $result = $db->select($sql);

        if($result != false)
        {
            $value = mysqli_fetch_array($result);
            $row = mysqli_num_rows($result);
            if($row>0)
            {
                Session::set("login", true);
                Session::set("username", $value['username']);
                Session::set("userId", $value['id']);
                header("Location:index.php");
            }
            else
            {
    echo "<span style='color:red;font-size:18px'>No Result Found</span>";
            }
        }
        else
        {
    echo "<span style='color:red;font-size:18px'>Username and Password Not Found</span>";
        }

    }
?>

            
            <form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
                            <input type="text" name="username" placeholder="Username" required="" name="username"/>
			</div>
			<div>
                            <input type="password" name="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
                            <input type="submit" name="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>

