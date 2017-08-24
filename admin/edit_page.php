<?php include('inc/header.php'); ?>
        
        <!--Header-->
    
<?php include('inc/sidebar.php'); ?> 
        
         <!--Sidebar-->

        <div class="grid_10">
		
<!--        get the id of the page from addpage.php    -->

<!--CSS STYLE ADDED-->
<style>
    
    .actiondel
    {
        margin-left: 10px;
    }
    .actiondel a 
    {
        background: #f0f0f0 none repeat scroll 0 0;
        border: 1px solid #ddd;
        color: #444;
        cursor: pointer;
        font-size: 20px;
        padding: 4px 10px;
        font-weight: normal;
    }
</style>

<?php

if(!isset($_GET['id']) && $_GET['id'] == NULL)
{
    header("location:index.php");
}

else
{
   $page_id = $_GET['id'];
}

?>
            
            
    <div class="box round first grid">
     
        
        
        
        <h2>Edit Page</h2>
        
<!--        php code for add post will go here-->

    <?php
    if(isset($_POST['update']))
    {   
        $page_title = mysqli_real_escape_string($db->link, $_POST['name']);
        $page_content  = mysqli_real_escape_string($db->link, $_POST['body']);
        
    if($page_title == "" || $page_content == "")
    {
        echo "<span class='error'>Field must be not be empty</span>";
    }
    else
    {
        $sql = "UPDATE tbl_page
                SET
                name = '$page_title',
                body = '$page_content'    
                WHERE id = '$page_id'
                ";
                
        $updated_rows = $db->insert($sql);
        
        if($updated_rows)
        {
            echo "<span class='success'>Page Updated Successfully.</span>";
        }
        else
        {
            echo "<span class='error'>Page Not Update !</span>";
        }
        
    }
    
}       
?>

        <div class="block"> 
            <?php
            
            $sql = "SELECT * FROM tbl_page WHERE id = '$page_id'";
            $add_post_by_id = $db->select($sql);
            if($add_post_by_id)
            {
                while($value = $add_post_by_id->fetch_assoc())
                {
                     ?>
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
           
    <tr>
        <td>
            <label>Title</label>
        </td>
        <td>
            <input type="text" name="name" value="<?= $value['name'] ?>" class="medium" />
        </td>
    </tr>
                                      
    <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Content</label>
        </td>
        <td>
            <textarea class="tinymce" name="body">
              <?= $value['body']; ?>
            </textarea>
        </td>
    </tr>

    <tr>
        <td></td>
        <td>
            <input type="submit" name="update" Value="Update" />
            <span class="actiondel">
                <a onclick="return confirm('Are you sure to delete')"
                    href="del_page.php?del_id=<?= $value['id'] ?>"
                      > Delete</a>
            </span>
        </td>
    </tr>
</table>
</form>
            
   <?php } } ?>          
            
            
            
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
               
         
       