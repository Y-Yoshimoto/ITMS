<!--Header -->
<?php $title ="Dashboard";$pagecss ="./page.css"; require '../header.php';?>
<!-- navbar -->
<?php require '../navbar.php';?>

    <div class="container">
         <div id="incidentCard" class="card-deck text-left">
         <!-- insert from incidentCard.js> -->
    </div>

<!-- modal moreinfo-->

<!-- モーダルの設定 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">インシデント</h5>
        <font color="red"><p id="message2" color="#FF0000"></p></font>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>インシデント情報</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
        <!--<button type="button" class="btn btn-primary">変更を保存</button>-->
      </div><!-- /.modal-footer -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--jquery, Bootstrap, popper -->
<?php require '../inclode.php'; ?>
<!-- include JavaScript -->
<script src="./incidentCard.js"></script>
<script src="./moreinfo.js"></script>
<!--footer -->
<?php require '../footer.php'; ?>
