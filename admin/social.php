<?php include('inc/header.php'); ?>
        
        <!--Header-->
    
<?php include('inc/sidebar.php'); ?> 
        
            <!--Sidebar-->
        
        
<div class="grid_10">
		
    <div class="box round first grid">
        <h2>Update Social Media</h2>
        
<!--        For update the Social-->
         
     <?php
    if(isset($_POST['update']))
    {
        $facebook = $format->validation($_POST['facebook']);
        $twitter = $format->validation($_POST['twitter']);
        $linkedin = $format->validation($_POST['linkedin']);
        $google = $format->validation($_POST['google']);
        
        
        $facebook  = mysqli_real_escape_string($db->link,$facebook);
        $twitter = mysqli_real_escape_string($db->link,$twitter);
        $linkedin  = mysqli_real_escape_string($db->link,$linkedin);
        $google = mysqli_real_escape_string($db->link,$google);
        
    if($facebook == "" || $twitter == "" || $linkedin == "" || $google == "")
    {
        echo "<span class='error'>Field must be not be empty</span>";
    }
 
    else
    { 
          $sql = "UPDATE tbl_social
                    SET
                    facebook = '$facebook',
                    twitter = '$twitter',
                    linkedin = '$linkedin',
                    google = '$google'

                    WHERE id = '1'
                    ";
            $updated_row = $db->update($sql);

            if ($updated_row)
            {
             echo "<span class='success'>Data Updated Successfully.
             </span>";
            }
            else
            {
             echo "<span class='error'>Data Not Updated !</span>";
            }
    }    
        
        
    } 
        
        ?>

        
        <div class="block">
        <?php

        $sql = "SELECT * FROM tbl_social WHERE id ='1'";
        $social_image = $db->select($sql);
        if($social_image)
        {
            while($value = $social_image->fetch_assoc())
            {
            ?>  

            
        <form action="" method="POST" enctype="multipart/form-date">
        <table class="form">

            <tr>
                <td>
                    <label>Facebook</label>
                </td>
                <td>
                    <input type="text" name="facebook" value="<?= $value['facebook'] ?>" class="medium" />
                </td>
            </tr>

            <tr>
               <td>
                   <label>Twitter</label>
               </td>
               <td>
                   <input type="text" name="twitter" value="<?= $value['twitter'] ?>" class="medium" />
               </td>
           </tr>

            <tr>
                <td>
                    <label>LinkedIn</label>
                </td>
                <td>
                    <input type="text" name="linkedin" value="<?= $value['linkedin'] ?>" class="medium" />
                </td>
            </tr>

            <tr>
                <td>
                    <label>Google</label>
                </td>
                <td>
                    <input type="text" name="google" value="<?= $value['google'] ?>" class="medium" />
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" name="update" Value="Update" />
                </td>
            </tr>
        </table>
        </form>
         <?php } } ?>
    </div>

    </div>
</div>

<?php include('inc/footer.php'); ?> 