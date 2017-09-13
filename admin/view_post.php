<?php include('inc/header.php'); ?>
        
        <!--Header-->
    
<?php include('inc/sidebar.php'); ?> 
        
         <!--Sidebar-->
        
        
<?php

//to check the id and get the id

if(!isset($_GET['viewpostid']) || $_GET['viewpostid']== NULL)
{
   echo "<script>window.location='postlist.php';</script>";
//    header("Location:catlist.php");
}
else
{
    $view_post = $_GET['viewpostid'];
}
?>
         <?php
         
         if(isset($_POST['ok']))
         {
             echo "<script>window.location='postlist.php'</script>";
         }
         
         ?>
         
         
        <div class="grid_10">
		
    <div class="box round first grid">
        <h2>View Post</h2>
        

       
        <div class="block">
<!--Pull out the value from the database including id   -->


<?php
        $sql ="SELECT * FROM tbl_post WHERE id = $view_post";
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
            <select id="select" readonly="">
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
            <input type="text" readonly="" value="<?=$result['title'];?>" class="medium" />
        </td>
    </tr>
                                      
                        
    <tr>
        <td>
            <label>Upload Image</label>
        </td>
        <td>
            
            <img src="<?=$result['image'];?>" height="100px" weight="250px">
            <br/>
            
<!--            <input type="file" name="image" />-->
<!--            Not need to upload file for view page-->
        </td>
    </tr>
    <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Content</label>
        </td>
        <td>
            <textarea class="tinymce" readonly="">
                
            <?=$result['body'];?>

            </textarea>
        </td>
    </tr>
          
    <tr>
        <td>
            <label>Author</label>
        </td>
        
      <td>
    <input type="text" readonly="" value="<?php echo Session::get('username')?>" class="medium" />
   
    </td>
        
    </tr>
    
    
    <tr>
        <td>
            <label>Tags</label>
        </td>
        <td>
            <input type="text" readonly="" value="<?=$result['tags'];?>" class="medium" />
        </td>
    </tr>

    <tr>
        <td></td>
        <td>
            <input type="submit" name="ok" Value="Ok" />
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
               
         
       