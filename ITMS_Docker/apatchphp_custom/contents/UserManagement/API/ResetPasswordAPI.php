<?php
    //パスワードリセット
    header("Content-Type: application/json; charset=UTF-8");
    //POSTされた値の取得
    $userID = filter_input(INPUT_POST, 'userID');

    //処理結果送信
    echo json_encode(ResetPassword($userID));
    exit;
?>

<?php
    function ResetPassword($userID){
        $statusCode = calldatabase($userID);
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
    function calldatabase($userID){
        //DB接続
        require_once("../../../inc/inquiry.inc");
        //パスワードリセット
        $sql = "UPDATE t_userdata SET password= '".md5($userID)."' WHERE userid = '".$userID."';";
        error_log("$sql");
        //SQL発行
        $insert = $dbh->exec($sql);
        $result = $insert >= 0 ? '0':'1';
        //出力結果確認:;
        error_log($result);
        return $result;
    }
 ?>
