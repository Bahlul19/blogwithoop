<?php include('inc/header.php'); ?>
        
        <!--Header-->
    
<?php include('inc/sidebar.php'); ?> 
        
    <!--Sidebar-->

    <style>
        .left-side
        {
            float: left;
            width: 70%;
        }
        .right-side
        {
            float: left;
            width: 20%
        }
        .right-side img
        {
            height: 160px;
            width: 170px;
        }
    </style>            

    <!--Update the Slogan page php code in below-->
    
     <?php
    if(isset($_POST['update']))
    {
        $title = $format->validation($_POST['title']);
        $slogan = $format->validation($_POST['slogan']);
        
        
        $title  = mysqli_real_escape_string($db->link, $_POST['title']);
        $slogan = mysqli_real_escape_string($db->link, $_POST['slogan']);
        
        $permited = array('png');
        $file_name = $_FILES['logo']['name'];
        $file_size = $_FILES['logo']['size'];
        $file_temp = $_FILES['logo']['tmp_name'];
        
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $same_image = 'logo'.'.'.$file_ext;
        $upload_image = "upload/". $same_image;
        
        
    if($title == "" || $slogan == "")
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

            $sql = "UPDATE tbl_slogan
                    SET
                    title = '$title',
                    slogan = '$slogan',
                   
                    logo = '$upload_image'
                    
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

            else
    {
                    $sql = "UPDATE tbl_slogan
                    SET
                    title = '$title',
                    slogan = '$slogan'

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
}       
?>
    
    
    
<!--    UPPER PHP CODE FOR UPDATE THE SLOGAN-->
    
    
    
    
    
    

<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Site Title and Description</h2>

    <?php

    $sql = "SELECT * FROM tbl_slogan WHERE id='1'";
    $blog_title = $db->select($sql);

    if($blog_title)
    {
       while($value = $blog_title->fetch_assoc())
       {
        ?>

        <div class="block sloginblock">    

    <!--Database theke value anar jonno php nibo-->

        <div class="left-side">

            <form action="" method="POST" enctype="multipart/form-data">
        <table class="form">					
            <tr>
                <td>
                    <label>Website Title</label>
                </td>
                <td>
                    <input type="text" value="<?= $value['title'] ?>" name="title" class="medium" />
                </td>
            </tr>

            <tr>
                <td>
                    <label>Website Slogan</label>
                </td>
                <td>
                    <input type="text" value="<?= $value['slogan'] ?>" name="slogan" class="medium" />
                </td>
            </tr>

             <tr>
                <td>
                    <label>Upload Image</label>
                </td>
                <td>
                    <input type="file" name="logo"/>
                </td>
            </tr>

            <tr>
               <td>
               </td>
               <td>
                   <input type="submit" name="update" Value="Update" />
               </td>
           </tr>


        </table>
        </form>


        </div>  

        <!--uporer div ta Form er uporer div-->

        <div class="right-side">

        <img src="<?= $value['logo']; ?>" alt="logo">

        </div>

        </div>

        <?php } } ?> 
        <!--Closing php-->

        </div>

        </div>
<?php include('inc/footer.php'); ?> 