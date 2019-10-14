<!--Header -->
<?php $title ="Dashboard";$pagecss ="./component/page.css"; require '../component/header.php';?>
<!-- navbar -->
<?php require '../component/navbar.php';?>

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
        <h5 class="modal-title" id="exampleModalLabel"><span id="massage1"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>インシデント情報</p>
	    <!-- インシデント名: <span id="massage1"></span><br> -->
	    サービス名: <span id="message2"></span><br>
            重要度: <span id="message3"></span><br>
            概要: <span id="message4"></span><br>
            対応: <span id="message5"></span><br>
            備考: <span id="message6"></span><br>
            登録時刻: <span id="message7"></span><br>
            更新時刻: <span id="message8"></span><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
        <!--<button type="button" class="btn btn-primary">変更を保存</button>-->
      </div><!-- /.modal-footer -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--jquery, Bootstrap, popper -->
<?php require '../component/inclode.php'; ?>
<!-- include JavaScript -->
<script src="./incidentCard.js"></script>
<script src="./moreinfo.js"></script>
<!--footer -->
<?php require '../component/footer.php'; ?>
