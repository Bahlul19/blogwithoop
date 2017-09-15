<?php include('inc/header.php'); ?>
        
        <!--Header-->
    
<?php include('inc/sidebar.php'); ?> 
        
         <!--Sidebar-->
        
        
        
        <div class="grid_10">
		
    <div class="box round first grid">
        <h2>View Message</h2>
        
<!--        php code for add post will go here-->


    <?php
    $viewmessageid = mysqli_real_escape_string($db->link, $_GET['msgid']);
    if(!isset($viewmessageid) && $viewmessageid==NULL)
    {
        echo "<script>windows.location= 'inbox.php'; </script>";
    }
    else
    {
        $msgid = $viewmessageid;
    }
    ?>

<?php

if(isset($_POST['submit']))
{
    echo "<script>window.location= 'inbox.php';</script>";
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
            <label>Name</label>
        </td>
        <td>
            <input type="text" readonly="" class="medium" value="<?= $value['firstname'].' '.$value['lastname']; ?>"/>
        </td>
    </tr>
    
     <tr>
        <td>
            <label>Email</label>
        </td>
        <td>
            <input type="text" readonly="" class="medium" value="<?= $value['email']; ?>"/>
        </td>
    </tr>
    
      <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Content</label>
        </td>
        <td>
            <textarea class="tinymce" readonly="">
                <?= $value['body']; ?>
            </textarea>
        </td>
    </tr>
                        
    <tr>
        <td>
            <label>Date</label>
        </td>
        <td>
            <input type="text" readonly="" class="medium" value="<?= $value['date']; ?>"/>
        </td>
    </tr>

    <tr>
        <td></td>
        <td>
            <input type="submit" name="submit" Value="Ok" />
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
               
         
       