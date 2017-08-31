<?php include('inc/header.php'); ?>
        
        <!--Header-->
    
<?php include('inc/sidebar.php'); ?> 
        
         <!--Sidebar-->
        
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
               
               <!--Insert dynamic code in this templete-->    
    <?php
    if(isset($_POST['submit']))
    {
        $cat_name = $format->validation($_POST['cat_name']);
        $cat_name = mysqli_real_escape_string($db->link,$cat_name);

        if(empty($cat_name))
        {
            echo "<span class='error'>Field must be not be empty</span>";
        }
        else
        {
           $sql = "INSERT INTO tbl_catagory (cat_name) VALUES('$cat_name')";
           $catagory_insert = $db->insert($sql);
           
           if($catagory_insert)
           {
               echo "<span class='success'>Catagory Inserted Successfully</span>";
           }
           else
           {
               echo "<span class='error'>Catagory Not Inserted</span>";
           }
           
        }

    }

    ?>    

    <form action="" method="POST" enctype="multipart/form-date">
     <table class="form">					
         <tr>
             <td>
                 <input type="text" name="cat_name" placeholder="Enter Category Name..." class="medium" />
             </td>
         </tr>
                                 <tr> 
             <td>
                 <input type="submit" name="submit" Value="Save" />
             </td>
         </tr>
     </table>
     </form>
 </div>
</div>
</div>
<?php include('inc/footer.php'); ?> 
