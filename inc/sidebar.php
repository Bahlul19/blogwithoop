		<div class="sidebar clear">
<div class="samesidebar clear">
        <h2>Categories</h2>
                <ul>
                    <?php 

                    $sql = "SELECT * FROM tbl_catagory";
                    $catagory = $db->select($sql);

                    if($catagory)
                    {
                        while($value = $catagory->fetch_assoc())
                        {
                            ?>

            <!--Create a new page posts.php and pass the catagory(id)-->

                        <li><a href="posts.php?catagory=<?= $value['id']; ?>"><?= $value['cat_name'] ?></a></li>
                    <?php } } else { ?>

                        <li> No Catagory Found</li>

                  <?php  } ?>

                </ul>
</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
                                
                                   
                            <?php
                            
             $sql = "SELECT * FROM tbl_post limit 5"; 
             $post = $db->select($sql);               
                            if($post)
                            {
                            while($value = $post->fetch_assoc())
                                {
                                ?>                             
    <div class="popular clear">
        
	<h3><a href="post.php?id=<?= $value['id']; ?>">
<?= $value['title']; ?></a></h3>
	<a href="post.php?id=<?= $value['id']; ?>"><img src="admin/<?= $value['image'] ?>" alt="post image"/></a>
	<?= $format->textShorten($value['body'],100); ?>	
        
</div>
            
                   <?php } ?>
                    
                   <?php } else {header ("Location:404.php"); } ?>
			</div>
			
		</div>
