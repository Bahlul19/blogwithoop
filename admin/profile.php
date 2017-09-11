<?php include('inc/header.php'); ?>
        
        <!--Header-->
    
<?php include('inc/sidebar.php'); ?> 
        
         <!--Sidebar-->
   
         <?php
         
         $userID   = Session::get('userId');
         $userRole = Session::get('userRole');
         
         ?>
         
         
        <div class="grid_10">
		
    <div class="box round first grid">
        <h2>Update Profile</h2>
        
<!--        php code for add post will go here-->

    <?php
    if(isset($_POST['update']))
    {
        
        $name = $format->validation($_POST['name']);
        $username = $format->validation($_POST['username']);
        $email = $format->validation($_POST['email']);
        $details = $format->validation($_POST['details']);
        
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $username  = mysqli_real_escape_string($db->link, $_POST['username']);
        $email   = mysqli_real_escape_string($db->link, $_POST['email']);
        $details = mysqli_real_escape_string($db->link, $_POST['details']);
      
       
        $sql = "UPDATE tbl_user
        SET
        name = '$name',
        username = '$username',
        email = '$email',
        details = '$details'
        WHERE id = '$userID'
        ";
            $updated_row = $db->update($sql);

            if ($updated_row)
            {
             echo "<span class='success'>User Data Updated Successfully.
             </span>";
            }
            else
            {
             echo "<span class='error'>User Data Not Updated !</span>";
            }
    }           
?>


       
        <div class="block">
<!--Pull out the value from the database including id   -->


<?php
        $sql ="SELECT * FROM tbl_user WHERE id ='$userID' AND role ='$userRole'";
        $profile = $db->select($sql);
        while($result = $profile -> fetch_assoc())
        {
        ?>

         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">            
                           
               
    <tr>
        <td>
            <label>Name</label>
        </td>
        <td>
            <input type="text" name="name" value="<?=$result['name'];?>" class="medium" />
        </td>
    </tr>
                                      
                        
    <tr>
        <td>
            <label>Username</label>
        </td>
        <td>
            <input type="text" name="username" value="<?=$result['username'];?>" class="medium" />
        </td>
    </tr>
    
    <tr>
        <td>
            <label>Email</label>
        </td>
        <td>
            <input type="text" name="email" value="<?=$result['email'];?>" class="medium" />
        </td>
    </tr>
    
    
    <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Content</label>
        </td>
        <td>
            <textarea class="tinymce" name="details">
                
            <?php echo $result['details']; ?>

            </textarea>
        </td>
    </tr>
          
    <tr>
        <td></td>
        <td>
            <input type="submit" name="update" Value="Save" />
        </td>
    </tr>
</table>
</form>

<?php } ?>



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
               
         
       