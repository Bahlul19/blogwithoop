<?php include('../lib/Session.php');
 Session::checkSession();
?>

<?php include('../config/config.php'); ?>
<?php include('../lib/Database.php'); ?>


<?php
 $db = new Database();
?> 

<?php

//to check the id and get the id

if(!isset($_GET['del_id']) ||$_GET['del_id']== NULL)
{
   echo "<script>window.location='index.php';</script>";
//    header("Location:catlist.php");
}
else
{
    $delete_page_id = $_GET['del_id'];

    $delSql = "DELETE FROM tbl_page WHERE id = '$delete_page_id'";
    $delete_post = $db->delete($delSql);

        if($delete_post)
        {
            echo "<script>alert('Page Deleted Successfully');</script>";
            echo "<script>window.location = 'index.php';</script>";
        }
        else
        {
            echo "<script>alert('Page not Deleted');</script>";
            echo "<script>window.location='index.php';</script>";
        }
}

?>