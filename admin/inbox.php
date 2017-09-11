<?php include('inc/header.php'); ?>
        
        <!--Header-->
    
<?php include('inc/sidebar.php'); ?> 
        
         <!--Sidebar-->
        
<div class="grid_10">

<!--    Inbox Part-->
    <?php include('inbox/inbox_part.php'); ?>

<!--    Another Part(Seen Part)-->
    
    <?php include('inbox/seen_part.php'); ?>

<!--Another Part(Draft Part)-->

    <?php include('inbox/draft_part.php'); ?>

   
    

    
</div>

         
         <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>
         
         
         
      <?php include('inc/footer.php'); ?> 