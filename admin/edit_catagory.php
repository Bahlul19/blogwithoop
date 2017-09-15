<?php include('inc/header.php'); ?>
        
        <!--Header-->
    
<?php include('inc/sidebar.php'); ?> 
        
         <!--Sidebar-->
<?php

//to check the id and get the id
   $catid = mysqli_real_escape_string($db->link, $_GET['catid']);

if(!isset($catid) || $catid== NULL)
{
   echo "<script>window.location='catlist.php';</script>";
//    header("Location:catlist.php");
}
else
{
    $edit_catagory = $catid;
}
?>    
         
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
               
               <!--Update dynamic code in this templete-->    
    <?php
    if(isset($_POST['update']))
    {
        $cat_name = $format->validation($_POST['cat_name']);
        $cat_name = mysqli_real_escape_string($db->link,$cat_name);

        if(empty($cat_name))
        {
            echo "<span class='error'>Field must be not be empty</span>";
        }
        else
        {
           $sql = "UPDATE tbl_catagory SET cat_name='$cat_name' WHERE id= $edit_catagory";
           $catagory_update = $db->update($sql);
           
           if($catagory_update)
           {
               echo "<span class='success'>Catagory Update Successfully</span>";
           }
           else
           {
               echo "<span class='error'>Catagory Not Updated</span>";
           }
           
        }

    }

    ?>    
               
    <!--Take dynamic id of the individual value in this templete-->
    
    <?php
    //for pull out the specific id of individual value
    $sql = "SELECT * FROM tbl_catagory WHERE id = $edit_catagory";
    $edit_catagory_by_id = $db->select($sql);
    while($value = $edit_catagory_by_id ->fetch_assoc())
    {
    ?>
             
    <form action="" method="POST" enctype="multipart/form-date">
     <table class="form">					
    <tr>
        <td>
            <input type="text" name="cat_name" value="<?= $value['cat_name'] ?>" class="medium" />
        </td>
    </tr>
                            <tr> 
    <td>
        <input type="submit" name="update" Value="Save" />
    </td>
    </tr>
     </table>
     </form>
    <?php } ?>
    </div>
    </div>
    </div>
    <?php include('inc/footer.php'); ?> 
