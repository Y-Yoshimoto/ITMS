<!--Header -->
<?php $title ="Login";$pagecss ="./page.css"; require '../header.php';?>


        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
          <h5 class="my-0 mr-md-auto font-weight-normal">ITSM</h5>
          <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#">特長</a>
            <a class="p-2 text-dark" href="#">事業</a>
            <a class="p-2 text-dark" href="#">サポート</a>
            <a class="p-2 text-dark" href="#">価格設定</a>
            <a class="btn btn-outline-info" href="#">検索</a>
            <a class="btn btn-outline-warning" href="/istm/login/">ログアウト</a>
          </nav>

        </div>
    <div id="incidentCard" class="box">

    </div>

<!--jquery, Bootstrap, popper -->
<?php require '../inclode.php'; ?>
<!-- include JavaScript -->
<script src="./incidentCard.js"></script>
<!--footer -->
<?php require '../footer.php'; ?>
