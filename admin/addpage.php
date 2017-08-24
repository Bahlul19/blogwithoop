<?php include('inc/header.php'); ?>
        
        <!--Header-->
    
<?php include('inc/sidebar.php'); ?> 
        
         <!--Sidebar-->

        <div class="grid_10">
		
    <div class="box round first grid">
        <h2>Add New Page</h2>
        
<!--        php code for add post will go here-->

    <?php
    if(isset($_POST['submit']))
    {   
        $page_title = mysqli_real_escape_string($db->link, $_POST['name']);
        $page_content  = mysqli_real_escape_string($db->link, $_POST['body']);
        
    if($page_title == "" || $page_content == "")
    {
        echo "<span class='error'>Field must be not be empty</span>";
    }
    else
    {
        $sql = "INSERT INTO tbl_page(name, body) VALUES ('$page_title', '$page_content')";
        $inserted_rows = $db->insert($sql);
        
        if($inserted_rows)
        {
            echo "<span class='success'>Page Created Successfully.</span>";
        }
        else
        {
            echo "<span class='error'>Page Not Created !</span>";
        }
        
    }
    
}       
?>

        <div class="block">               
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
           
    <tr>
        <td>
            <label>Title</label>
        </td>
        <td>
            <input type="text" name="name" placeholder="Enter Post Title..." class="medium" />
        </td>
    </tr>
                                      
                        

    <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Content</label>
        </td>
        <td>
            <textarea class="tinymce" name="body"></textarea>
        </td>
    </tr>


    <tr>
        <td></td>
        <td>
            <input type="submit" name="submit" Value="Create" />
        </td>
    </tr>
</table>
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
               
         
       