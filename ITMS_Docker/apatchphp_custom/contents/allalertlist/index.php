<?php session_start(); ?>
<?php $title ="全アラートリスト";$pagecss ="../alertlist/page.css"; require '../component/header.php';?>
<!-- navbar -->
<?php require '../component/navbar.php';?>

<div class="container">
  <div class="row mx-lg-n5">
    <h4>アラート一覧</h4>
    <table class="table table-hover">
        <caption id="getListMessage">更新:</caption>
        <!-- ヘッダー　------------------------------->
      <thead class="thead-dark">
        <tr>
          <th>ID</th>
          <th scope="col">システム</th>
          <th scope="col">アラート名</th>
          <th scope="col">ホスト名</th>
          <th scope="col">発生時刻</th>
          <th scope="col">インシデントNo.</th>
      </tr>
      </thead>
        <!-- データ　------------------------------->
      <tbody  id="setAlertList_th">
      </tbody>
  </table>
</div>
</div>

<!--jquery, Bootstrap, popper -->
<?php require '../component/inclode.php'; ?>
<!-- include JavaScript -->
<script src="./AllalertlistAPICall.js"></script>
<!--footer -->
<?php require '../component/footer.php'; ?>
