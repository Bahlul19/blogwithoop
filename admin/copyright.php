<?php include('inc/header.php'); ?>
        
        <!--Header-->
    
<?php include('inc/sidebar.php'); ?> 
        
         <!--Sidebar-->
        


<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Copyright Text</h2>
        
        <?php
        if(isset($_POST['update']))
        {
            $note = $format->validation($_POST['note']);
            $note = mysqli_real_escape_string($db->link, $_POST['note']);
            
        if($note == "")
        {
         echo "<span class='error'>Field must be not be empty</span>";
        }
 
        else
        {  
            $sql = "UPDATE tbl_footer
                    SET
                    note = '$note'
                    
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
        
        <div class="block copyblock"> 
            <?php

            $sql = "SELECT * FROM  tbl_footer WHERE id ='1'";
            $copyright = $db->select($sql);
            if($copyright)
            {
                while($value = $copyright->fetch_assoc())
                {
            ?>
     <form action="" method="POST" enctype="multipart/form-data">
       <table class="form">					
        <tr>
            <td>
                <input type="text" name="note" value="<?= $value['note'] ?>" class="large" />
            </td>
        </tr>

        <tr> 
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