<?php include('inc/header.php'); ?>
        
        <!--Header-->
    
<?php include('inc/sidebar.php'); ?> 
        
         <!--Sidebar-->
   
<!--      Get the view id from the userlist.php-->

        <?php
        $viewuserid = mysqli_real_escape_string($db->link, $_GET['userid']);
        if(!isset($viewuserid) && $viewuserid == NULL)
        {
           echo "<script>windows.location= 'userlist.php'; </script>";
        }
         else
        {
            $userID = $viewuserid;
        } 
       
        ?>


         
        <div class="grid_10">
		
    <div class="box round first grid">
        <h2>User Details</h2>
        
<!--        php code for add post will go here-->

         <?php

         if(isset($_POST['submit']))
         {
             echo "<script>window.location= 'userlist.php';</script>";
         }

         ?> 


       
        <div class="block">
<!--Pull out the value from the database including id   -->


<?php
        $sql ="SELECT * FROM tbl_user WHERE id ='$userID'";
        $profile = $db->select($sql);
        while($result = $profile -> fetch_assoc())
        {
        ?>

         <form action="" method="POST">
            <table class="form">            
                           
               
    <tr>
        <td>
            <label>Name</label>
        </td>
        <td>
            <input type="text" name="name" readonly="" value="<?=$result['name'];?>" class="medium" />
        </td>
    </tr>
                                      
                        
    <tr>
        <td>
            <label>Username</label>
        </td>
        <td>
            <input type="text" name="username"readonly="" value="<?=$result['username'];?>" class="medium" />
        </td>
    </tr>
    
    <tr>
        <td>
            <label>Email</label>
        </td>
        <td>
            <input type="text" name="email" readonly="" value="<?=$result['email'];?>" class="medium" />
        </td>
    </tr>
    
    
    <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Content</label>
        </td>
        <td>
            <textarea class="tinymce" readonly="" name="details">
                
            <?php echo $result['details']; ?>

            </textarea>
        </td>
    </tr>
          
    <tr>
        <td></td>
        <td>
            <input type="submit" name="submit" Value="OK" />
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
               
         
       