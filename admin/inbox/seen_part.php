    
<div class="box round first grid">
<h2>Seen Message</h2>
<div class="block">
    
<!--    To move unseen massage to inbox part-->

<!--    DELETE CODE WILL GO HERE-->
    
    <?php    
    if(isset($_GET['unseenid']))
    {
        $unseenId = $_GET['unseenid'];
        $sql = "UPDATE tbl_contact
                SET
                status = 0
                WHERE id = '$unseenId'
                ";
        $updated_row = $db->update($sql);
        if($updated_row)
        {
             echo "<span class='success'>Message Sent into the Inbox</span>";
        }
        else 
        {
             echo "<span class='error'>Something went wrong</span>";
        }
    }
    
    ?>

<!--    THIS CODE IS FOR MOVE THE VALUE INTO DRAFT-->

    <?php
    
    if(isset($_GET['draftid']))
    {
        $draftID = $_GET['draftid'];
        $sql = "UPDATE tbl_contact
                SET
                status = 2
                WHERE id ='$draftID'
                 ";
        $updated_row = $db->update($sql);
        if($updated_row)
        {
             echo "<span class='success'>Message Sent into the Draft</span>";
        }
        else 
        {
             echo "<span class='error'>Something went wrong</span>";
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
    
    $sql = "SELECT * FROM tbl_contact WHERE status='1' ";
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
                    <a onclick="return confirm('Are you sure to move into Inbox')" 
                       href="?unseenid=<?=$value['id']?>">Unseen</a> ||
                     <a onclick="return confirm('Are you sure to move into Draft')" 
                       href="?draftid=<?=$value['id']?>">Draft</a>   
                     
                 </td>
         </tr>
    <?php } } ?>

</tbody>
</table>
</div>
</div>
