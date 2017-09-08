<?php include('inc/header.php'); ?>

<!--Php code will go here-->
<style>
    .cuserror
    {
        color:red;
        float: left;
    }
</style>
<?php
 /*
if(isset($_POST['submit']))
{
   
    $firstname = $format->validation($_POST['firstname']);
    $lastname = $format->validation($_POST['lastname']);
    $email = $format->validation($_POST['email']);
    $body = $format->validation($_POST['body']);
    
    $firstname = mysqli_real_escape_string($db->link, $firstname);
    $lastname = mysqli_real_escape_string($db->link, $lastname);
    $email = mysqli_real_escape_string($db->link, $email);
    $body = mysqli_real_escape_string($db->link, $body);
 */
    
/*
    $error = "";
    if(empty($firstname))
    {
        $error = "Please Fill Up The Firstname";
    }
    else if(empty($lastname))
    {
        $error = "Please Fill Up The Lastname";
    }
    else if(empty($email))
    {
        $error = "Please Fill Up The Email";
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $error = "Invalid Email Address";
    }
    else if(empty($body))
    {
        $error = "Please Fill Up The Message Field";
    }
    //<!--Now inserting Value into Database through tbl_contact-->
    //amra else er modde success insert diye debo

 */
/*
    $errorFirstname = "";
    $errorLastname = "";
    $errorEmail = "";
    $errorBody = "";
    
    if(empty($firstname))
    {
        $errorFirstname = "Firstname must not be empty";
    }
    
    if(empty($lastname))
    {
        $errorLastname = "Lastname must not be empty";
    }
    
    if(empty($email))
    {
        $errorEmail = "Email must not be empty";
    }
    
    if(empty($body))
    {
        $errorBody = "Body must not be empty";
    }
    else
    {
//     $msg = "Ok";
        
        
        $sql = "INSERT INTO tbl_contact
             (firstname,lastname,email,body) VALUES
             ('$firstname','$lastname','$email','$body')";
        $inserted_rows = $db->insert($sql);
        
        if ($inserted_rows) {
        $msg = "Message Sent Successfully";
              }
       else {
            $error = "Message Not Sent";
            }
    }
}
 */

    if(isset($_POST['submit']))
    {
        $firstname = $format->validation($_POST['firstname']);
        $lastname = $format->validation($_POST['lastname']);
        $email = $format->validation($_POST['email']);
        $body = $format->validation($_POST['body']);
        
        $firstname = mysqli_real_escape_string($db->link, $firstname);
        $lastname = mysqli_real_escape_string($db->link, $lastname);
        $email = mysqli_real_escape_string($db->link, $email);
        $body = mysqli_real_escape_string($db->link, $body);
        
        $errorFirstname = "";
        $errorLastname  = "";
        $errorEmail     = "";
        $errorBody      = "";
        
//        NOTUN FORMULAY KORBO EKHON
        
        if(empty($firstname))
        {
            $errorFirstname = "First name must not be empty";
        }
        if(empty($lastname))
        {
            $errorLastname = "Last name must not be empty";
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $errorEmail = "Invalid Email";
        }
        if(empty($body))
        {
            $errorBody = "Message field must not be empty";
        }
        
        
        
        
        /*
        if(empty($firstname))
        {
            $error = "Firstname must not be empty";
        }
        else if(empty($lastname))
        {
            $error = "Last name must not be empty";
        }
        else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $error = "Invalid Email";
        }
        else if(empty($body))
        {
            $error = "Message must not be empty";
        }
         
         */
        else 
        {
           $sql = "INSERT INTO tbl_contact(firstname,lastname,email,body)
                  VALUES('$firstname','$lastname','$email','$body')
                   ";
           $inserted_rows = $db->insert($sql);
           
           if($inserted_rows)
           {
               $msg = "Message Sent Successfully";
           }
           else
           {
              $error = "Message not sent";
           }
                   
        }
    }
?>


<div class="contentsection contemplete clear">
        <div class="maincontent clear">
                <div class="about">
                        <h2>Contact us</h2>
                        
                        
<!--          PHP code will go here              -->


<?php
    if(isset($msg))
    {
         echo "<span style='color:green'>$msg</span>";
    }
?>


                        
<form action="" method="post">
<table>
<tr>
        <td>Your First Name:</td>
        <td>
        <input type="text" name="firstname" placeholder="Enter first name">
        <?php 
        if(isset($errorFirstname))
        echo "<span class='cuserror'>$errorFirstname</span>"; 
        ?>
        </td>
</tr>
<tr>
        <td>Your Last Name:</td>
        <td>
        <input type="text" name="lastname" placeholder="Enter Last name">
        <?php
        if(isset($errorLastname))
        echo "<span class='cuserror'>$errorLastname</span>"; 
        ?>
        </td>
</tr>

<tr>
        <td>Your Email:</td>
        <td>
        <input type="text" name="email" placeholder="Enter Email Address">
        <?php
        if(isset($errorEmail))
        echo "<span class='cuserror'>$errorEmail</span>"; 
        ?>
        </td>
</tr>
<tr>
        <td>Your Message:</td>
        <td>
            <textarea name="body"></textarea>
            <?php
            if(isset($errorBody))
            echo "<span class='cuserror'>$errorBody</span>"; 
            ?>
        </td>
</tr>
<tr>
        <td></td>
        <td>
        <input type="submit" name="submit" value="Send"/>
        </td>
</tr>
</table>
<form>				
</div>

</div>



<?php include('inc/sidebar.php'); ?>


<?php include('inc/footer.php'); ?>