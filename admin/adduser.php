<?php include('inc/header.php'); ?>
        
        <!--Header-->
    
<?php include('inc/sidebar.php'); ?> 
        
         <!--Sidebar-->
        
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 
               
               <!--Insert dynamic code in this templete-->    
    <?php
    if(isset($_POST['submit']))
    {
        $username = $format->validation($_POST['username']);
        $username = mysqli_real_escape_string($db->link,$username);
        
        $password = $format->validation(md5($_POST['password']));
        $password = mysqli_real_escape_string($db->link,$password);
        
        $role = $format->validation($_POST['role']);
        $role = mysqli_real_escape_string($db->link,$role);

        if(empty($username)||empty($password)||empty($role))
        {
            echo "<span class='error'>Field must be not be empty</span>";
        }
        else
        {
           $sql = "INSERT INTO tbl_user (username,password,role) VALUES('$username','$password','$role')";
           $insert_row = $db->insert($sql);
           
           if($insert_row)
           {
               echo "<span class='success'>User Created Successfully</span>";
           }
           else
           {
               echo "<span class='error'>User Not Created</span>";
           }
           
        }

    }

    ?>    

    <form action="" method="POST" enctype="multipart/form-date">
     <table class="form">					
         <tr>
             <td>
                 <label>Username</label>
             </td>
             <td>
                 <input type="text" name="username" placeholder="Enter User Name..." class="medium" />
             </td>
         </tr>
         
         <tr>
             <td>
                 <label>Password</label>
             </td>
             <td>
                 <input type="password" name="password" placeholder="Enter Password..." class="medium" />
             </td>
         </tr>
         
         <tr>
             <td>
                 <label>User Role</label>
             </td>
             <td>
                 <select id="select" name="role">
                     
                     <option>Select User Role</option>
                     <option value="0">Admin</option>
                     <option value="1">Author</option>
                     <option value="2">Editor</option>
                     
                 </select>
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
</div>
<?php include('inc/footer.php'); ?> 
