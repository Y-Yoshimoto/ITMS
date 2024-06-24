<!--Header -->
<?php $title ="インシデン登録";$pagecss ="../registration/page.css"; require '../component/header.php';?>
<!-- navbar -->
<?php require '../component/navbar.php';?>

<div class="form-box">

<!-- インシデント登録フォーム -->
  <form class="form-incidentdata">
    <h3 class="h3 mb-3 font-weight-normal">インシデント登録</h3>
    <!-- メッセージ -->
    <p class="SysMessage" id="SysMessage"</p>
     <div class="row">
         <div class="form-group col">
           <label for="Input">インシデント名</label>
           <input type="text" class="form-control" id="incidentName" required>
         </div>

         <div class="form-group col">
             <label for="Input">対象サービス</label>
             <input type="text" class="form-control" id="servce" required>
         </div>

    </div>
    <div class="form-group">
    <label for="Input">緊急度</label>
    <select class="custom-select"　type="text" id="severity" required>
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
      <textarea class="form-control" id="brief" rows="3" required></textarea>
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">対応</label>
      <textarea class="form-control" id="handling" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">備考</label>
      <textarea class="form-control" id="remark" rows="3"></textarea>
    </div>

    <button class="btn btn-lg btn-primary btn-block" id="registrationIncidentAPICall" type="submit">登録</button>
  </form>

</div>

<!--jquery, Bootstrap, popper -->
<?php require '../component/inclode.php'; ?>
<!-- include JavaScript -->
<script src="./registrationIncidentAPICall.js"></script>
<!--footer -->
<?php require '../component/footer.php'; ?>
