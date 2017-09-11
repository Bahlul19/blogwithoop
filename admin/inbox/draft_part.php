<div class="box round first grid">
<h2>Draft Message</h2>
<div class="block">
    
<!--    To move unseen massage to inbox part-->

<!--    DELETE CODE WILL GO HERE-->
    <?php
    
    if(isset($_GET['delid']))
    {
        $delId = $_GET['delid'];
        $sql = "DELETE FROM tbl_contact WHERE id='$delId'";
        $deleted_row = $db->delete($sql);
        if($deleted_row)
        {
              echo "<span class='success'>Message Deleted Successfully</span>";
        }
        else 
        {
             echo "<span class='error'>Message not deleted</span>";
        }
    } 
    ?>
    
    
    
<table class="data display datatable" id="example">
<thead>
        <tr>
<!--User Jokhon Message Patabe tar information gulo nite hobe-->
<th style="width: 10%">Serial No.</th>
                <th style="width: 15%">Name</th>
                <th style="width: 15%">Email</th>
                <th style="width: 25%">Message</th>
                <th style="width: 10%">Date</th>
                <th style="width: 20%">Action</th>
        </tr>
</thead>
<tbody>
    
<!--        PHP CODE will go here -->

    <?php
    
    $sql = "SELECT * FROM tbl_contact WHERE status='2' ";
    $contact = $db->select($sql);
    if($contact)
    {
        $i=0;
        while($value = $contact->fetch_assoc())
        {
            $i++;
            ?>

        <tr class="odd gradeX">
                 <td><?= $i ?></td>
                 <td><?= $value['firstname'].' '.$value['lastname']; ?></td>
                 
<!--                Firstname and Lastname concrate kora hoise-->

                  <td><?= $value['email']; ?></td>
                  <td><?= $format->textShorten($value['body']); ?></td>
                  <td><?= $format->formatDate($value['date']); ?></td>
                 <td>
                <a href="viewmessage.php?msgid=<?=$value['id']?>">View</a> || 
                <a onclick="return confirm('Are you sure to delete')" 
                   href="?delid=<?=$value['id']?>">DELETE</a>
                     
                 </td>
         </tr>
    <?php } } ?>

</tbody>
</table>
</div>
</div> 
