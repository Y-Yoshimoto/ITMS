<?php
    //パスワード変更
    header("Content-Type: application/json; charset=UTF-8");
    //POSTされた値の取得
    $userID = filter_input(INPUT_POST, 'userID');
    $password = filter_input(INPUT_POST, 'password');

    //処理結果送信
    echo json_encode(ChangePassword($userID, md5($password)));
    exit;
?>

<?php
    function ChangePassword($userID,$md5password){
        $statusCode = calldatabase($userID, $md5password);
        error_log("StatusCode:"."$statusCode");
        return makeInfo($statusCode);
    }
    //レスポンス用JSON生成
    function makeInfo($statusCode){
        $result = array(
        "statusCode" => $statusCode) ;
        return $result;
    }
?>

<?php
    //ユーザー認証DB問合せ
    function calldatabase($userID, $md5password){
        //DB接続
        require_once("../../../inc/inquiry.inc");
        //パスワード変更
        $sql = "UPDATE t_userdata SET password= '".$md5password."' WHERE userid = '".$userID."';";
        error_log("$sql");
        //SQL発行
        $insert = $dbh->exec($sql);
        $result = $insert >= 1 ? '0':'1';
        //出力結果確認:;
        return $result;
    }
 ?>
