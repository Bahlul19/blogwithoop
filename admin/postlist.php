<?php include('inc/header.php'); ?>
        
        <!--Header-->
    
<?php include('inc/sidebar.php'); ?> 
        
            <!--Sidebar-->

        
        
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
        <thead>
                <tr>
                        <th width="5%">No</th>
                        <th width="15%">Post Title</th>
                        <th width="18%">Description</th>
                        <th width="10%">Category</th>
                        <th width="7%">Image</th>
                        <th width="12%">Author</th>
                        <th width="8%">Tags</th>
                        <th width="9%">Date</th>
                        <th width="16%">Action</th>
                </tr>
        </thead>
        <tbody>
            
<!--            Select Post Query-->
            <?php
            
$sql = "SELECT tbl_post.*, tbl_catagory.cat_name FROM tbl_post INNER JOIN tbl_catagory
       ON tbl_post.cat_id = tbl_catagory.id ORDER By tbl_post.title DESC";
        
        $post = $db->select($sql);
       //joint query chalaite oibo        
            
        if($post)
        {
            while($value =$post->fetch_assoc())
            {
                ?>
                
                <tr class="odd gradeX">
                    
<td><?=$value['id']?></td>
<td><?=$value['title']?></td>
<td><?=$format->textShorten($value['body'],50);?></td>
<td><?=$value['cat_name']?></td>
<td><img src="<?= $value['image'];?>" height="40px" width="60px"></td>                       
<!--image should be different-->
<td><?=$value['author']?></td>
<td><?=$value['tags']?></td>
<td><?=$format->formatDate($value['date'])?></td>


<!--Only jara post dise mane jar under a post ache tara and admin a post edit and delete
korto farbo-->
<td>
     <a href="view_post.php?viewpostid=<?=$value['id']?>">View</a>
     
     <?php
     
     if(Session::get('userId')== $value['userid'] || Session::get('userRole') =="0")
     {
         ?>
     || <a href="edit_post.php?editpostid=<?=$value['id']?>">Edit</a>
    
            || <a onclick="return confirm('Are you sure to delete')" href="delete_post.php?delpostid=<?=$value['id']?>">Delete</a>

    <?php } ?>
     
     
     
     
     
   

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

  
<?php include('inc/footer.php');?>        
