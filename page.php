<?php include('inc/header.php'); ?>

<!--get the id of individual page-->

<?php

if(!isset($_GET['pageid']) && $_GET['pageid'] == NULL)
{
    header("location:404.php");
}

else
{
   $page_id = $_GET['pageid'];
}

?>
<?php
$sql = "SELECT * FROM tbl_page WHERE id = '$page_id'";
        $page_by_id = $db->select($sql);
        
        if($page_by_id)
        {
            while($value = $page_by_id->fetch_assoc())
            {
                  ?>  

<div class="contentsection contemplete clear">
<div class="maincontent clear">
        <div class="about">
            

               <h2><?= $value['name'] ?></h2>

               <?= $value['body']; ?>
        
        </div>

        </div>
    
     <?php } } else { header("location:404.php"); }?>
    
    <?php include('inc/sidebar.php'); ?>

    <?php include('inc/footer.php'); ?>