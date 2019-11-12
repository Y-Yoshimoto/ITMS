<!--Header -->
<?php $title ="ダッシュボード";$pagecss ="../Dashboard/page.css"; require '../component/header.php';?>
<!-- navbar -->
<?php require '../component/navbar.php';?>
<!-- インシデントカード -->
    <div class="container">
         <div id="incidentCard" class="card-deck text-left">
         <!-- insert from incidentCard.js> -->
    </div>

<!-- インシデント情報更新(モーダル) -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <!-- モーダルヘッダー -->
      <div class="modal-header">
        <!-- <h3 class="modal-title" id="exampleModalLabel"><span id="incidentNameModal"></span></h3> -->
        <textarea class="form-control oneRowArea oneRowLarge" id="incidentNameModal" rows="1" required></textarea>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- モーダルのカード本文 -->
      <div class="modal-body">
        <!-- アラート -->
        <span class="SysMessage" id="SysMessage"></span>
        <!--<span class="alert alert-primary" role="alert" id="SystemMessage"></span> -->
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
      <!-- モーダルフッター -->
      <div class="modal-footer">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="closedFlag">
            <label class="form-check-label">完了</label>
            <!-- <label class="form-check-label checkBoxLabel">完了</label> -->
        </div>
        <a class="btn btn-info" id="22" href="/itms/alertlist/">アラート管理</a>
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
<script src="./incidentListAPICall.js"></script>
<script src="./incidentInfoAPICall.js"></script>
<script src="./updateIncidentAPICall.js"></script>
<!--footer -->
<?php require '../component/footer.php'; ?>
