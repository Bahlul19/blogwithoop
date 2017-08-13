                       
<?php include('inc/header.php'); ?>

<?php include('inc/slider.php'); ?>
            
<?php
//get the id(catagory)
if(!isset($_GET['catagory'])||$_GET['catagory'] == NULL)
{
    header("Location:404.php");
}
else 
{
    $cat_id = $_GET['catagory'];
}

?>  
            <div class="contentsection contemplete clear">
		<div class="maincontent clear">
            
                    <?php 
                    
                    $sql = "SELECT * FROM tbl_post WHERE cat_id = $cat_id";
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
	<a href="#"><img src="admin/upload/<?= $value['image'] ?>" alt="post image"/></a>
				
        <p> <?= $format->textShorten($value['body']); ?> </p>
    
<div class="readmore clear">
    
<a href="post.php?id=<?= $value['id']; ?>">Read More</a>

</div>
</div>
  
              <?php } ?>
                    
                   <?php } else {header ("Location:404.php"); } ?>
            
            
            	</div>
            
            <?php include('inc/sidebar.php'); ?>

            
            <?php include('inc/footer.php'); ?>
            

            