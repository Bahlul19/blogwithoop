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
                  
						<li><a href="posts.php?catagory=<?= $value['id']; ?>"><?= $value['cat_name'] ?></a></li>
                                            <?php } } else { ?>
                                                
                                                <li> No Catagory Found</li>
                                                
                                          <?php  } ?>
											
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
                                
                                   
                            <?php
                            
//                           $db = new Database();
                            
             $sql = "SELECT * FROM tbl_post limit 4"; 
             $post = $db->select($sql);               
                            if($post)
                            {
                            while($value = $post->fetch_assoc())
                                {
                                ?>                             
    <div class="popular clear">
	<h3><a href="#">Post title will be go here..</a></h3>
	<a href="#"><img src="admin/upload/<?php $value['image'] ?>" alt="post image"/></a>
	<p>Sidebar text will be go here.Sidebar text will be go here.
            Sidebar text will be go here.Sidebar text will be go here.</p>	
					</div>
            
                   <?php } ?>
                    
                   <?php } else {header ("Location:404.php"); } ?>
			</div>
			
		</div>
