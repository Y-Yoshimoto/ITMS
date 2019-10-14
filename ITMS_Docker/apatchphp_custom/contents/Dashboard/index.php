<!--Header -->
<?php $title ="ダッシュボード";$pagecss ="../Dashboard/page.css"; require '../component/header.php';?>
<!-- navbar -->
<?php require '../component/navbar.php';?>
<!--  カード -->
    <div class="container">
         <div id="incidentCard" class="card-deck text-left">
         <!-- insert from incidentCard.js> -->
    </div>

<!-- modal moreinfo-->

<!-- モーダルの設定 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h3 class="modal-title" id="exampleModalLabel"><span id="incidentNameModal"></span></h3> -->
        <textarea class="form-control oneRowArea oneRowLarge" id="incidentNameModal" rows="1" required></textarea>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <h5>インシデント情報</h5> -->
        <span id="SystemMessage"></span>
	    <!-- サービス名: <span id="servceModal"></span><br>
            重要度: <span id="severityModal"></span><br>
            概要: <span id="briefModal"></span><br>
            対応: <span id="handlingModal"></span><br>
            備考: <span id="remarkModal"></span><br>
            登録時刻: <span id="recodeTimeModal"></span><br>
            更新時刻: <span id="updateTimeModal"></span><br> -->
            <form class="form-incidentdata">
            サービス名:
            <textarea class="oneRowArea form-control" id="servceModal" rows="1" required></textarea>

            <div class="form-group">
                緊急度: <select class="custom-select selected colorSelect"　type="text" id="severityModal" required>
                    <option value="1">情報</option>
                    <option value="2">警告</option>
                    <option value="3">軽障害</option>
                    <option value="4">重障害</option>
                    <option value="5">致命的</option></select></div>

                概要:
                <textarea class="form-control" id="briefModal" rows="3" required></textarea>
                対応:
                <textarea class="form-control" id="handlingModal" rows="3"></textarea>
                備考:
                <textarea class="form-control" id="remarkModal" rows="3"></textarea>
                登録時刻: <span id="recodeTimeModal"></span><br>
                更新時刻: <span id="updateTimeModal"></span><br>
                <input type="hidden" name="incidentNumber" id="incidentNumberModal">
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="updateIncidentAPICall" type="submit">更新</button>
        <!-- <button type="button" class="btn btn-primary" id="updateIncidentAPICall" data-dismiss="modal">更新</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
      </div><!-- /.modal-footer -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--jquery, Bootstrap, popper -->
<?php require '../component/inclode.php'; ?>
<!-- include JavaScript -->
<script src="./incidentCard.js"></script>
<script src="./moreinfo.js"></script>
<script src="./updateIncidentAPICall.js"></script>
<!--footer -->
<?php require '../component/footer.php'; ?>
