<?php include('inc/header.php'); ?>
        
        <!--Header-->
    
<?php include('inc/sidebar.php'); ?> 
        
         <!--Sidebar-->
        
        
        
        <div class="grid_10">
		
    <div class="box round first grid">
        <h2>View Message</h2>
        
<!--        php code for add post will go here-->

    <?php
    
     $replyid = mysqli_real_escape_string($db->link, $_GET['msgid']);
    
    if(!isset($replyid) && $replyid==NULL)
    {
        echo "<script>windows.location= 'inbox.php'; </script>";
    }
    else
    {
        $msgid = $replyid;
    }
    ?>

<?php

if(isset($_POST['submit']))
{
        $to = $format->validation($_POST['toEmail']);
        $from = $format->validation($_POST['fromEmail']);
        $subject = $format->validation($_POST['subject']);
        $message = $format->validation($_POST['message']);
        
        $sendmail = mail($to, $subject, $message, $from);
        
        if($sendmail)
        {
            echo "<span class='success'>Message Sent Successfully.
     </span>";
        }
        else
        {
        echo "<span class='error'>Message Not Send !</span>";
        }
        
}

?>

        <div class="block">               
         <form action="" method="POST" enctype="multipart/form-data">
             <!--        php code for add post will go here-->
             
             <?php
             
             $sql = "SELECT * FROM tbl_contact WHERE id= '$msgid'";
             $viewInboxDetails = $db->select($sql);
             if($viewInboxDetails)
             {
                 while($value = $viewInboxDetails->fetch_assoc())
                 {
                     ?>
             
             
            <table class="form">                
               
    <tr>
        <td>
            <label>To</label>
        </td>
        <td>
            <input type="text" readonly="" name="toEmail" class="medium" value="<?=$value['email']?>"/>
        </td>
    </tr>    
     <tr>
        <td>
            <label>From</label>
        </td>
        <td>
            <input type="text" name="fromEmail" class="medium" placeholder="Please Enter Email Address"/>
        </td>
    </tr>
    
     <tr>
        <td>
            <label>Subject</label>
        </td>
        <td>
            <input type="text" name="subject" class="medium" placeholder="Please Enter The Subject"/>
        </td>
    </tr>
    
      <tr>
        <td>
            <label>Message</label>
        </td>
        <td>
            <textarea class="tinymce" name="message">
               
            </textarea>
        </td>
    </tr>
                        
   

    <tr>
        <td></td>
        <td>
            <input type="submit" name="submit" Value="Sent" />
        </td>
    </tr>
</table>
             
            <?php } } ?> 
             
</form>
</div>
</div>


            
              
         <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
            
             <!-- Load TinyMCE -->
            
        </div> <?php include('inc/footer.php'); ?> 
               
         
        