<?php include('inc/header.php'); ?>
            
<?php
//get the id(catagory)
if(!isset($_GET['search']) || $_GET['search'] == NULL)
{
    header("Location:404.php");
}
else 
{
    $search = $_GET['search'];
}

?>  
            <div class="contentsection contemplete clear">
		<div class="maincontent clear">
            
                    <?php 
                    
 $sql = "SELECT * FROM tbl_post WHERE tags LIKE '%$search%' OR body LIKE '%$search%'";
                    $post = $db->select($sql);  
                    
                    if($post)
                    {
                        while($value = $post->fetch_assoc())
                        {
                          ?>   

            <div class="samepost clear">
<h2><a href="post.php?id=<?= $value['id']; ?>">
<?= $value['title']; ?></a></h2>
    <h4><?= $format->formatDate($value['date']); ?>, By <a href="#"><?= $value['author'] ?></a></h4>
	<a href="#"><img src="admin/<?= $value['image'] ?>" alt="post image"/></a>
				
        <p> <?= $format->textShorten($value['body']); ?> </p>
    
<div class="readmore clear">
    
<a href="post.php?id=<?= $value['id']; ?>">Read More</a>

</div>
</div>
  
              <?php } ?>
                    
                   <?php } else {?>  
                    
                    <h3 style="color:red">Your Search Query not found</h3>
                    
                    <?php } ?>
            
            
            	</div>
            
            <?php include('inc/sidebar.php'); ?>

            
            <?php include('inc/footer.php'); ?>
            

            