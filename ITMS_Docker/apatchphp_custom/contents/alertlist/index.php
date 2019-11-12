<?php session_start(); ?>
<?php $title ="アラートリスト";$pagecss ="../alertlist/page.css"; require '../component/header.php';?>
<!-- navbar -->
<?php require '../component/navbar.php';?>

<div class="container px-lg-2">
  <div class="row mx-lg-n5">
      <!-- インシデント情報 -->
      <div class="col-12 col-md-4 px-lg-2 border bg-light">
          <!-- インシデント登録フォーム -->
          <form class="form-incidentdata">
              <h3 class="h3 mb-3 font-weight-normal">インシデント紐づけ</h3>
              <!-- メッセージ -->
              <p class="SysMessage" id="SysMessage"></p>
                  <div class="row">
                      <div class="form-group col">
                          <label for="Input">インシデント名</label>
                          <textarea readonly  class="form-control" id="incidentName" rows="1"></textarea>
                      </div>
                      <div class="form-group col">
                          <label for="Input">対象サービス</label>
                          <textarea readonly  class="form-control" id="servce" rows="1"></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="Input">緊急度</label>
                      <textarea readonly  class="form-control severity" id="severity" rows="1"></textarea>
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlTextarea1">概要</label>
                      <textarea readonly class="form-control" id="brief" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlTextarea1">対応</label>
                      <textarea readonly class="form-control" id="handling" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlTextarea1">備考</label>
                      <textarea readonly class="form-control" id="remark" rows="3"></textarea>
                  </div>
                  <button class="btn btn-lg btn-outline-secondary btn-block" id="getincidentData" type="submit">再取得</button><br>
              </form>
</div>

     <div class="col-12 col-md-8 px-lg-2 border bg-light">
    <h4>対応インシデント</h4>
    <table class="table">
        <caption id="getListMessage">更新:</caption>
        <!-- ヘッダー　------------------------------->
      <thead class="thead-dark">
        <tr>
          <th>ID</th>
          <th scope="col">システム</th>
          <th scope="col">アラート名</th>
          <th scope="col">ホスト名</th>
          <th scope="col">発生時刻</th>
          <th scope="col">解除</th>
      </tr>
      </thead>
        <!-- データ　------------------------------->
      <tbody  id="setAlertList_th">
      </tbody>
  </table>

<h4>未割当インシデント</h4>
<table class="table table-striped">
    <!-- ヘッダー　------------------------------->
  <thead class="thead-dark">
    <tr>
      <th>ID</th>
      <th scope="col">システム</th>
      <th scope="col">アラート名</th>
      <th scope="col">ホスト名</th>
      <th scope="col">発生時刻</th>
      <th scope="col">紐付け</th>
  </tr>
  </thead>
    <!-- データ　------------------------------->

    <tbody  id="unsetAlertList_th">
    </tbody>
    </table>
     </div>
  </div>
</div>

<!--jquery, Bootstrap, popper -->
<?php require '../component/inclode.php'; ?>
<!-- include JavaScript -->
<script src="./incidentDataAPICall.js"></script>
<script src="./alertlistAPICall.js"></script>
<script src="./Set_INumber.js"></script>
<script src="./Reset_INumber.js"></script>
<!--footer -->
<?php require '../component/footer.php'; ?>
