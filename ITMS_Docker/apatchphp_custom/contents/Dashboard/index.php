<!--Header -->
<?php $title ="Dashboard";$pagecss ="./page.css"; require '../header.php';?>
<!-- navbar -->
<?php require '../navbar.php';?>

    <div class="container">
         <div id="incidentCard" class="card-deck text-left">
         <!-- insert from incidentCard.js> -->
    </div>

<!-- popup moreinfo-->

<!--jquery, Bootstrap, popper -->
<?php require '../inclode.php'; ?>
<!-- include JavaScript -->
<script src="./incidentCard.js"></script>
<script src="./moreinfo.js"></script>
<!--footer -->
<?php require '../footer.php'; ?>
