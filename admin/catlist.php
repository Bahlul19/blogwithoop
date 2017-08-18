<?php include('inc/header.php'); ?>
        
        <!--Header-->
    
<?php include('inc/sidebar.php'); ?> 
        
         <!--Sidebar-->
         
<div class="grid_10">
    <div class="box round first grid">
      <h2>Category List</h2>
      
              
            <!--For delete query goes here-->
<?php

  if(isset($_GET['catid']))
  {
      $delete_catagory_id = $_GET['catid'];
      $sql = "DELETE FROM tbl_catagory WHERE id =$delete_catagory_id";
      $delete_catagory = $db->delete($sql);
      
      if($delete_catagory)
        {
            echo "<span class='success'>Catagory Deleted Successfully</span>";
        }
        else
        {
            echo "<span class='error'>Catagory Not Deleted</span>";
        }
  }
?>
      
      
        <div class="block">        
            <table class="data display datatable" id="example">
    <thead>
            <tr>
                    <th>Serial No.</th>
                    <th>Category Name</th>
                    <th>Action</th>
            </tr>
    </thead>
    <tbody>
    <?php

    $sql = "SELECT * FROM tbl_catagory";
    $catagory = $db->select($sql);

if($catagory)
{
    while($value = $catagory->fetch_assoc())
    { 
    ?>
    <tr class="odd gradeX">
     <!--If we use i value for shundorjo then we not print id of catagory table-->
    <td><?= $value['id']; ?></td>
    <td><?= $value['cat_name']; ?></td>
    
    <td>
        <a href="edit_catagory.php?catid=<?=$value['id']?>">Edit</a> 
        || <a onclick="return confirm('Are you sure to delete')"
              href="?catid=<?=$value['id']?>">Delete</a>
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
         
         
         
         