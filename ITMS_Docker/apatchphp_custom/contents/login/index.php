<!--Header -->
<?php $title ="ログイン";$pagecss ="../login/page.css"; require '../component/header.php';?>

<div class="form-box">
    <!-- ログインフォーム -->
  <form class="form-signin">
    <img class="mb-4" src="../icon.svg" alt="" width="64" height="64">
    <h3 class="h3 mb-3 font-weight-normal">ITSM ログイン</h3>
    <!-- インプット`` -->
    <label for="inputEmail" class="sr-only">ユーザーID</label>
    <input type="email" id="inputUserID" class="form-control" placeholder="ユーザーID" required autofocus>
    <label for="inputPassword" class="sr-only">パスワード</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="パスワード" required>

     <!-- <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="rememberCheck">
      <label class="form-check-label" for="rememberCheck">
        ユーザーIDとパスワードを保存する
      </label>
    </div> -->
    <button class="btn btn-lg btn-primary btn-block" id="loginAPICall" type="submit">ログイン</button>
    <font color="red"><p id="message1" color="#FF0000"></p></font>

    <!-- <p class="mt-5 mb-3 text-muted">&copy;2019</p> -->
  </form>
</div>

<!--jquery, Bootstrap, popper -->
<?php require '../component/inclode.php'; ?>
<!-- include JavaScript -->
<script src="./loginAPICall.js"></script>
<!--footer -->
<?php require '../component/footer.php'; ?>
