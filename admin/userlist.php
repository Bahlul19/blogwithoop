
<?php include('inc/header.php'); ?>
        
        <!--Header-->
    
<?php include('inc/sidebar.php'); ?> 
        
         <!--Sidebar-->
         
<div class="grid_10">
    <div class="box round first grid">
      <h2>User List</h2>
      
              
            <!--For delete query goes here-->
<?php

  if(isset($_GET['deluser']))
  {
      $delete_user_id = $_GET['deluser'];
      $sql = "DELETE FROM tbl_user WHERE id =$delete_user_id";
      $delete_user = $db->delete($sql);
      
      if($delete_user)
        {
            echo "<span class='success'>User Data Deleted Successfully</span>";
        }
        else
        {
            echo "<span class='error'>User Data Not Deleted</span>";
        }
  }
?>
      
      
        <div class="block">        
            <table class="data display datatable" id="example">
    <thead>
            <tr>
                     <th>Serial No.</th>
                     <th>Name</th>
                     <th>Username</th>
                     <th>Email</th>
                     <th>Details</th>
                     <th>Role</th>
                     <th>Action</th>
            </tr>
    </thead>
    <tbody>
    <?php

    $sql = "SELECT * FROM tbl_user";
    $userList = $db->select($sql);

if($userList)
{
    while($value = $userList->fetch_assoc())
    { 
    ?>
    <tr class="odd gradeX">
     <!--If we use i value for shundorjo then we not print id of catagory table-->
   <td><?= $value['id']; ?></td>
   <td><?= $value['name']; ?></td>
   <td><?= $value['username']; ?></td>
   <td><?= $value['email']; ?></td>
   <td><?= $format->textShorten($value['details'], 30); ?></td>
   
<!--   for user role we need to check it through condition-->
    <td>
   <?php
   
   if($value['role'] == '0')
   {
       echo "Admin";
   }
   else if($value['role'] =='1')
   {
       echo "Author";
   }
   else if($value['role'] =='2')
   {
       echo "Editor";
   }
   
   ?>
    </td>
    
    <td>
        <a href="viewuser.php?userid=<?=$value['id']?>">View</a> 
        || <a onclick="return confirm('Are you sure to delete')"
              href="?deluser=<?=$value['id']?>">Delete</a>
        <!--jodi same file o delete/update korte oyy taile path kowa lage na ?khali id ta -->
    </td>
     </tr>
   <?php } ?>
<?php } ?>

        
        
    </tbody>
  </table>
       </div>
    </div>
</div>
         
         
         <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>
         
               <?php include('inc/footer.php'); ?> 
         
         
         
         