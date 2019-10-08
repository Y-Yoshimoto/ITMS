<!--Header -->
<?php $title ="Dashboard";$pagecss ="./page.css"; require '../header.php';?>
<!-- navbar -->
<?php require '../navbar.php';?>

    <div class="container">
         <div id="incidentCard" class="card-deck text-left">
         <!-- insert from incidentCard.js> -->
    </div>

<!--jquery, Bootstrap, popper -->
<?php require '../inclode.php'; ?>
<!-- include JavaScript -->
<script src="./incidentCard.js"></script>
<!--footer -->
<?php require '../footer.php'; ?>
