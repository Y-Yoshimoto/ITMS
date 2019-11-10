<?php
    //ユーザ削除
    header("Content-Type: application/json; charset=UTF-8");
    //POSTされた値の取得
    $Message = filter_input(INPUT_POST, 'Message');
    $Subject = filter_input(INPUT_POST, 'Subject');
    $To = filter_input(INPUT_POST, 'To');

    error_log($_POST);

    error_log("StatusCode:"."$Message");
    error_log("StatusCode:"."$Subject");
    error_log("StatusCode:"."$To");

    //処理結果送信
    //echo json_encode();
    exit;
 ?>
