<?php include('config/config.php'); ?>
<?php include('lib/Database.php'); ?>

<?php include('helpers/Format.php'); ?>

<?php
 $db = new Database();
 $format = new Format();
?>


<!DOCTYPE html>
<html>
<head>
<!--    PHP CODE WILL BE GOES HERE-->
    <?php
    
    if(isset($_GET['pageid']))
    {
        $pageTitleid = $_GET['pageid'];
        $sql = "SELECT * FROM tbl_page WHERE id ='$pageTitleid'";
        $page = $db->select($sql);
        if($page)
        {
            while($value = $page->fetch_assoc())
            {
               ?>
                <title>
                    <?= $value['name']; ?>
                    -<?= TITLE;?>
                </title>
    <?php } } } 
    
    //TITLE A EVERY POST ER NAME O ASBE
    
    else if(isset($_GET['id']))
    {
        $postid = $_GET['id'];
        $sql = "SELECT * FROM tbl_post WHERE id ='$postid'";
        $post = $db->select($sql);
        if($post)
        {
            while($value = $post->fetch_assoc())
            {
               ?>
                <title>
                    <?= $value['title']; ?>
                    -<?= TITLE;?>
                </title>
    <?php } } }
    
    else { ?>
    
            <title>
                    <?= $format->title();?>
                    -<?= TITLE; ?>
                </title>
    <?php } ?>
    

    
<!--   FOR TITLE SECTION THAT'S WHY WE USE THAT FORMULA ON THAT PART-->
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a href="#">
			<div class="logo">
                                   
                      <?php 
                            
                      $sql = "SELECT * FROM tbl_slogan WHERE id='1'";
                      $blog_title = $db->select($sql);

                      if($blog_title)
                      {
                         while($value = $blog_title->fetch_assoc())
                         {
                         ?>
                        <img src="admin/<?= $value['logo'];?>" alt="Logo"/>
                        <h2><?= $value['title']; ?></h2>
                        <p><?= $value['slogan'] ?></p>
                      <?php } } ?>     


			</div>
		</a>
		<div class="social clear">
                    
    <div class="icon clear">
                         <?php

        $sql = "SELECT * FROM tbl_social WHERE id ='1'";
        $social_media = $db->select($sql);
        if($social_media)
        {
            while($value = $social_media->fetch_assoc())
            {
            ?>      
        
            <a href="<?= $value['facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="<?= $value['twitter'] ?>" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="<?= $value['linkedin'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
            <a href="<?= $value['google'] ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
            
        <?php } } ?>    
    </div>
                    
    <div class="searchbtn clear">
    <form action="search.php" method="get">
            <input type="text" name="search" placeholder="Search keyword..."/>
            <input type="submit" name="submit" value="Search"/>
    </form>
    </div>
		</div>
	</div>
<div class="navsection templete">
	<ul>

		<li><a id="active" href="index.php">Home</a></li>
		
          <!-- Pull Out the page from database-->      
                <?php
                
                $sql = "SELECT * FROM tbl_page";
                $all_pages = $db->select($sql);
                if($all_pages)
                {
                    while($value = $all_pages->fetch_assoc())
                    {
                        ?>
 <li><a href="page.php?pageid=<?=$value['id']?>"><?=$value['name']?></a></li>	
                    <?php } } ?>
                
                   <li><a href="contact.php">Contact</a></li>
                
                
	</ul>
  
</div>