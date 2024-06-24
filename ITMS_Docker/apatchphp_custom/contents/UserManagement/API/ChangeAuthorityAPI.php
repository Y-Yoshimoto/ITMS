<?php
    //ユーザ権限変更
    header("Content-Type: application/json; charset=UTF-8");
    //POSTされた値の取得
    $userID = filter_input(INPUT_POST, 'userID');
    $authority= filter_input(INPUT_POST, 'authority');

    //処理結果送信
    echo json_encode(ChangeAuthority($userID,$authority));
    exit;
?>

<?php
    function ChangeAuthority($userID,$authority){
        $statusCode = calldatabase($userID,$authority);
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
    function calldatabase($userID,$authority){
        //DB接続
        require_once("../../../inc/inquiry.inc");
        //ユーザ権限変更
        $sql = "UPDATE t_userdata SET Authority= ".$authority." WHERE userid = '".$userID."';";
        error_log("$sql");
        //SQL発行
        $insert = $dbh->exec($sql);
        $result = $insert >= 1 ? '0':'1';
        //出力結果確認:;
        error_log($result);
        return $result;
    }
 ?>
