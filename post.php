<?php
include ('inc/header.php');
?>

<!--Catch the id first-->

<?php

if(!isset($_GET['id'])||$_GET['id'] == NULL)
{
    header("Location:404.php");
}
else 
{
    $id = $_GET['id'];
}

?>
<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
                            
                            
                            <?php
                            
//                           $db = new Database();
                            
             $sql = "SELECT * FROM tbl_post WHERE id = $id"; 
             $post = $db->select($sql);               
                            if($post)
                            {
                            while($value = $post->fetch_assoc())
                                {
                                ?>
          <h2><?= $value['title']; ?></h2>
<h4><?= $format->formatDate($value['date']); ?>, By <a href="#"><?= $value['author'] ?></a></h4>
<img src="admin/upload/<?= $value['image'] ?>" alt="MyImage"/>

<p> <?= $value['body']; ?> </p>

                          
                                   <!--End while loop-->

        <div class="relatedpost clear">
	<h2>Related articles</h2>
        
        <!--For related post write some php code inside it-->
        <?php
        
       $cat_id = $value['cat_id'];
       //first take the cat_id of the related post

       $sql = "SELECT * FROM tbl_post WHERE cat_id = '$cat_id' limit 6"; 
       $post_related = $db->select($sql);  
       
       if($post_related)
       {
                while($relatedvalue = $post_related->fetch_assoc())
                {
                ?>
                <a href="post.php?id=<?= $relatedvalue['id']; ?>">
                <img src="admin/upload/<?= $relatedvalue['image'] ?>" alt="MyImage"/></a>
	
	
       <?php } } else{ echo "No Realted Post Available";}?>
                            
        </div>
                            <?php } }  else{header("Location:404.php");} ?>
                            
                            
                            
<!--For related course or lagy-->
 

	</div>
                             

		</div>
		
		<?php include('inc/sidebar.php'); ?>

                <?php include('inc/footer.php'); ?>
	