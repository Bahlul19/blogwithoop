<?php include('../lib/Session.php');
 Session::checkSession();
?>

<?php include('../config/config.php'); ?>
<?php include('../lib/Database.php'); ?>
<?php include('../helpers/Format.php'); ?>

<?php
 $db = new Database();
?> 

<?php

//to check the id and get the id

if(!isset($_GET['delpostid']) ||$_GET['delpostid']== NULL)
{
   echo "<script>window.location='postlist.php';</script>";
//    header("Location:catlist.php");
}
else
{
    $delete_post_id = $_GET['delpostid'];

    $sql = "SELECT * FROM tbl_post WHERE id = '$delete_post_id'";

    $getData = $db->select($sql);

    if($getData)
    {
        while($deleteimage = $getData->fetch_assoc())
        {
            $deletelink = $deleteimage['image'];
            unlink($deletelink);
        }
    }

    $delSql = "DELETE FROM tbl_post WHERE id = '$delete_post_id'";
    $delete_post = $db->delete($delSql);

        if($delete_post)
        {
            echo "<script>alert('Data Deleted Successfully');</script>";
            echo "<script>window.location = 'postlist.php';</script>";
        }
        else
        {
            echo "<script>alert('Data not Deleted');</script>";
            echo "<script>window.location = 'postlist.php';</script>";
        }
}

?>