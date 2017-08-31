<?php include('inc/header.php'); ?>
        
        <!--Header-->
    
<?php include('inc/sidebar.php'); ?> 
        
         <!--Sidebar-->
        
        
<?php

//to check the id and get the id

if(!isset($_GET['editpostid']) || $_GET['editpostid']== NULL)
{
   echo "<script>window.location='postlist.php';</script>";
//    header("Location:catlist.php");
}
else
{
    $edit_post = $_GET['editpostid'];
}
?>
         
         
         
        <div class="grid_10">
		
    <div class="box round first grid">
        <h2>Update Post</h2>
        
<!--        php code for add post will go here-->

    <?php
    if(isset($_POST['update']))
    {
        
        $cat_id = mysqli_real_escape_string($db->link, $_POST['cat_id']);
        $title  = mysqli_real_escape_string($db->link, $_POST['title']);
        $body   = mysqli_real_escape_string($db->link, $_POST['body']);
        $author = mysqli_real_escape_string($db->link, $_POST['author']);
        $tags   = mysqli_real_escape_string($db->link, $_POST['tags']);
       
        
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $upload_image = "upload/".$unique_image;
        
        
    if($cat_id == "" || $title == "" || $body == "" || $author == "" || $tags == "")
    {
        echo "<span class='error'>Field must be not be empty</span>";
    }
 
    else
    {   //this else use for validation
    
 
if(!empty($file_name))
{
    
    //The file might not be empty
    
    if ($file_size >1048567)
    {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>"; 
    } 
    elseif (in_array($file_ext, $permited) === false) 
    {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    } 
    
    else
    {  
            move_uploaded_file($file_temp, $upload_image);

            $sql = "UPDATE tbl_post
                    SET
                    cat_id = '$cat_id',
                    title = '$title',
                    body = '$body',
                    image = '$upload_image',
                    author = '$author',
                    tags = '$tags'
                    WHERE id = '$edit_post'
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

            else
    {
                    $sql = "UPDATE tbl_post
                    SET
                    cat_id = '$cat_id',
                    title = '$title',
                    body = '$body',
                    author = '$author',
                    tags = '$tags'
                    WHERE id = '$edit_post'
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
}       
?>


<!--Get the id of the individaul post-->
<!--postid ta holo id ta-->


<!-- amra fetch individual value ante database thaki $result use korsi cz
$value dile ayy na karon $value already diya korsi catagory ante otar
lagy mono oy -->

       
        <div class="block">
<!--Pull out the value from the database including id   -->


<?php
        $sql ="SELECT * FROM tbl_post WHERE id = $edit_post";
        $edit_post_by_id = $db->select($sql);
        while($result = $edit_post_by_id -> fetch_assoc())
        {
        ?>

         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">            
      <tr>
        <td>
            <label>Category</label>
        </td>
        <td>
            <select id="select" name="cat_id">
                <option>Select Catagory</option>
                
<!--                Pull out the catagory name from the database-->
                
                <?php 
                
                $sql = "SELECT * FROM tbl_catagory";
                $catagory = $db->select($sql);
                
                if($catagory)
                {
                while($value = $catagory->fetch_assoc())
                {
                ?>
<!--    option er bitre ow condition diya catagory tuliya ana oy 

-->
                <option
                    
                    <?php 
                    
                    if($result['cat_id'] == $value['id'])
                    {
                        ?>
                    
                    selected="selected"
                    
                   <?php } ?>

                    
            value="<?= $value['id']; ?>"><?= $value['cat_name']; ?>
                    
                </option>
                
                <?php } ?>
                
                 <?php } ?>
                
            </select>
        </td>
    </tr>
                           
               
    <tr>
        <td>
            <label>Title</label>
        </td>
        <td>
            <input type="text" name="title" value="<?=$result['title'];?>" class="medium" />
        </td>
    </tr>
                                      
                        
    <tr>
        <td>
            <label>Upload Image</label>
        </td>
        <td>
            
            <img src="<?=$result['image'];?>" height="80px" weight="200px">
            <br/>
            
            <input type="file" name="image" />
        </td>
    </tr>
    <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Content</label>
        </td>
        <td>
            <textarea class="tinymce" name="body">
                
            <?=$result['body'];?>

            </textarea>
        </td>
    </tr>
          
    <tr>
        <td>
            <label>Author</label>
        </td>
        <td>
            <input type="text" name="author" value="<?=$result['author'];?>" class="medium" />
        </td>
    </tr>
    
    
    <tr>
        <td>
            <label>Tags</label>
        </td>
        <td>
            <input type="text" name="tags" value="<?=$result['tags'];?>" class="medium" />
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
               
         
       