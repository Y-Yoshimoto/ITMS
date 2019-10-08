<!--Header -->
<?php $title ="registration";$pagecss ="./page.css"; require '../header.php';?>
<!-- navbar -->
<?php require '../navbar.php';?>

<div class="form-box">
    <!-- ログインフォーム -->
  <form class="form-incidentdata">
    <h3 class="h3 mb-3 font-weight-normal">インシデント登録</h3>
    <font color="red"><p id="message1" color="#FF0000"></p></font>
     <div class="row">
         <div class="form-group col">
           <label for="Input">インシデント管理名</label>
           <input type="text" class="form-control" id="incidentName" placeholder="">
         </div>

         <div class="form-group col">
             <label for="Input">対象サービス</label>
             <input type="text" class="form-control" id="servce" placeholder="">
         </div>

    </div>
    <div class="form-group">
    <label for="Input">緊急度</label>
    <select class="custom-select"　id="severity">
      <option selected>(選択して下さい)</option>
      <option value="1">情報</option>
      <option value="2">警告</option>
      <option value="3">軽障害</option>
      <option value="3">重障害</option>
      <option value="3">致命的</option>
    </select>
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">概要</label>
      <textarea class="form-control" id="brief" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">対応</label>
      <textarea class="form-control" id="handling" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">備考</label>
      <textarea class="form-control" id="remark" rows="3"></textarea>
    </div>

    <button class="btn btn-lg btn-primary btn-block" id="loginAPICall" type="submit">登録</button>


  </form>
</div>

<!--jquery, Bootstrap, popper -->
<?php require '../inclode.php'; ?>
<!--footer -->
<?php require '../footer.php'; ?>
