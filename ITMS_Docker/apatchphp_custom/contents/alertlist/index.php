<?php session_start(); ?>
<?php $title ="アラートリスト";$pagecss ="../alertlist/page.css"; require '../component/header.php';?>
<!-- navbar -->
<?php require '../component/navbar.php';?>

<div class="container px-lg-1">
  <div class="row mx-lg-n5">
     <!-- インシデント情報 -->
    <div class="col-12 col-md-4 px-lg-1 border bg-light">

<!-- インシデント登録フォーム -->
  <form class="form-incidentdata">
    <h3 class="h3 mb-3 font-weight-normal">インシデント紐づけ</h3>
    <!-- メッセージ -->
    <p class="SysMessage" id="SysMessage"</p>
     <div class="row">
         <div class="form-group col">
           <label for="Input">インシデント名</label>
          <h6 id="incidentName"></h6>
         </div>

         <div class="form-group col">
             <label for="Input">対象サービス</label>
             <h6 id="servce"></h6>
         </div>

    </div>
    <div class="form-group">
    <label for="Input">緊急度</label>
    <select class="custom-select"　type="text" id="severity">
      <option selected>(選択して下さい)</option>
      <option value="1">情報</option>
      <option value="2">警告</option>
      <option value="3">軽障害</option>
      <option value="4">重障害</option>
      <option value="5">致命的</option>
    </select>
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">概要</label>
      <textarea id="brief" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">対応</label>
      <textarea id="handling" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">備考</label>
      <textarea id="remark" rows="3"></textarea>
    </div>

    <button class="btn btn-lg btn-primary btn-block" id="getincidentData" type="submit">登録</button>
  </form>

    </div>

     <div class="col-12 col-md-8 px-lg-1 border bg-light">
    <table class="table table-striped">
    <h4>アラートリスト</h4>
        <caption id="getListMessage">更新:</caption>
        <!-- ヘッダー　------------------------------->
      <thead class="thead-dark">
        <tr>
          <th>システム</th>
          <th scope="col">アラート名</th>
          <th scope="col">ホスト名</th>
          <th scope="col">発生時刻</th>
          <th scope="col">インシデント</th>
      </tr>
      </thead>
        <!-- データ　------------------------------->
      <tbody  id="alertlist_th">
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
<!--footer -->
<?php require '../component/footer.php'; ?>
