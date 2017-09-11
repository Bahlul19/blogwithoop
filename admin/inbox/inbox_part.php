<div class="box round first grid">  
<h2>Inbox</h2>

<!--    Seen Message ta seen message a chole jabe   For Seen Message-->
<?php

    if(isset($_GET['seenid']))
    {
        $seendID = $_GET['seenid'];
        $sql = "UPDATE tbl_contact 
                SET 
                status = '1'
                WHERE id='$seendID'
                ";
        $updated_row = $db->update($sql);
        if($updated_row)
        {
            echo "<span class='success'>Message Sent into the Seen Message</span>";
        }
        else
        {
            echo "<span class='error'>Something went wrong</span>";
        }
    }


?>



<div class="block">        
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
    
    $sql = "SELECT * FROM tbl_contact WHERE status='0' ";
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
               <a href="viewmessage.php?msgid=<?=$value['id']?>">View</a> 
           || <a href="replymsg.php?msgid=<?=$value['id']?>">Reply</a>
           || <a  onclick="return confirm('Are you sure to move this in seen messages')"
                  href="?seenid=<?=$value['id']?>">Seen</a>
            </td>
         </tr>
    <?php } } ?>

</tbody>
</table>
</div>
</div>