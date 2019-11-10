<!--Header -->
<?php $title ="インシデン登録";$pagecss ="../UserManagement/page.css"; require '../component/header.php';?>
<!-- navbar -->
<?php require '../component/navbar.php';?>

<div class="container px-lg-5">
  <div class="row mx-lg-n5">
     <!-- ユーザ管理 -->
    <div class="col-12 col-md-6 px-lg-5 border bg-light">

        <!-- ユーザ登録 -------------------->
        <form class="form-AddUser">
                <h3 class="h3 mb-3 font-weight-normal">ユーザ登録</h3>
            <div class="row">
                <div class="col-8">
            登録ユーザーID<label for="inputUserID" class="sr-only">登録ユーザーID</label>
            <input type="text" id="inputUserID" class="form-control form-control-sm" placeholder="ユーザーID" required autofocus>
            登録パスワード<label for="inputPassword" class="sr-only">パスワード</label>
            <input type="password" id="inputPassword" class="form-control form-control-sm" placeholder="パスワード" required>
            <div class="Input">
            <label for="newAuthority"></label>
            権限<select class="custom-select custom-select-sm"　type="text" id="inputAuthority" required>
              <option selected>(選択して下さい)</option>
              <option value="1">管理者</option>
              <option value="2">一般ユーザ</option>
                </select>
                </div>
            </div>
                <div class="col-4">
                <p class="SysMessage-sm" id="AddUser_Message"></p>
            <button class="btn btn-lg btn-primary btn-offset" id="AddUser" type="submit">登録</button>
                </div>
            </div>
        </form><hr>

        <!-- ユーザ削除 -------------------->
        <form class="form-DellteUser">
                <h3 class="h3 mb-3 font-weight-normal">ユーザ削除</h3>
            <div class="row">
                <div class="col-8">
            削除対象ユーザーID<label for="inputEmail" class="sr-only">ユーザーID</label>
            <input type="email" id="DellteUserID" class="form-control form-control-sm" placeholder="ユーザーID" required autofocus>
                </div>
                <div class="col-4">
                <p class="SysMessage-sm" id="DellteUser_Message"></p>
            <button class="btn btn-lg btn-danger btn-offset" id="DellteUser" type="submit">削除</button>
                </div>
            </div>
        </form><hr>

        <!-- 権限変更 -------------------->
        <form class="form-ChangeAuthority">
                <h3 class="h3 mb-3 font-weight-normal">権限変更</h3>
            <div class="row">
                <div class="col-8">
            変更対象ユーザーID<label for="inputEmail" class="sr-only">ユーザーID</label>
            <input type="email" id="ChangeUserID" class="form-control form-control-sm" placeholder="ユーザーID" required autofocus>
            <div class="Input">
            <label for="newAuthority"></label>
            権限<select class="custom-select custom-select-sm"　type="text" id="newAuthority" required>
              <option selected>(選択して下さい)</option>
              <option value="1">管理者</option>
              <option value="2">一般ユーザ</option>
          </select>
          </div>
                </div>
                <div class="col-4">
                <p class="SysMessage-sm" id="ChangeAuthority_Message"></p>
            <button class="btn btn-lg btn-info btn-offset" id="ChangeAuthority" type="submit">権限</button>
                </div>
            </div>
        </form><hr>

        <!-- パスワード更新 -------------------->
        <form class="form-ChangePassword">
                <h3 class="h3 mb-3 font-weight-normal">パスワード更新</h3>
            <div class="row">
                <div class="col-8">
            新規パスワード<label for="newPassword" class="sr-only">パスワード</label>
            <input type="password" id="newPassword" class="form-control form-control-sm" placeholder="パスワード" required>
            パスワード確認<label for="RenewPassword" class="sr-only">パスワード</label>
            <input type="password" id="RenewPassword" class="form-control form-control-sm" placeholder="パスワード" required>
                </div>
                <div class="col-4">
                <p class="SysMessage-sm" id="ChangePassword_Message"></p>
            <button class="btn btn-lg btn-warning btn-offset" id="ChangePassword" type="submit">更新</button>
                </div>
            </div>
        </form><hr>

        <!-- パスワード -------------------->
        <form class="form-ResetUser">
                <h3 class="h3 mb-3 font-weight-normal">パスワードリセット</h3>
            <div class="row">
                <div class="col-8">
            対象ユーザーID<label for="ResetUserID" class="sr-only">ユーザーID</label>
            <input type="email" id="ResetUserID" class="form-control form-control-sm" placeholder="ユーザーID" required autofocus>
                </div>
                <div class="col-4">
                <p class="SysMessage-sm" id="ResetUser_Message"></p>
            <button class="btn btn-lg btn-success btn-offset" id="ResetUser" type="submit">リセット</button>
                </div>
            </div>
        </form><br>

    </div>
    <!-- ユーザ一覧 -->
    <div class="col-12 col-md-6 px-lg-5 border bg-light">
    <h3 class="h3 mb-3 font-weight-normal">ユーザ一覧</h3>

        <!--  ユーザ一覧表　------------------------------->
    <table class="table table-striped table-hover">
        <caption id="getListMessage">更新:</caption>
        <!-- ヘッダー　------------------------------->
      <thead class="thead-dark">
        <tr>
          <th>No.</th>
          <th scope="col">ユーザID</th>
          <th scope="col">権限</th>
      </tr>
      </thead>
        <!-- データ　------------------------------->
      <tbody  id="UserLiset_th">
      </tbody>
    </table>
    </div>
  </div>
</div>
<!--jquery, Bootstrap, popper -->
<?php require '../component/inclode.php'; ?>
<!-- include JavaScript -->
<script src="./userListAPICall.js"></script>
<script src="./API/AddUserAPICall.js"></script>
<script src="./API/DellteUserAPICall.js"></script>
<script src="./API/ChangeAuthorityAPICall.js"></script>
<script src="./API/ChangePasswordAPICall.js"></script>
<script src="./API/ResetUserAPICall.js"></script>
<!--footer -->
<?php require '../component/footer.php'; ?>
