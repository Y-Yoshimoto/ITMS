<?php
    header("Content-Type: application/json; charset=UTF-8");
    //POSTされた値の取得
    $userID = filter_input(INPUT_POST, 'userID');
    $password = filter_input(INPUT_POST, 'password');
    $authority= filter_input(INPUT_POST, 'authority');

    //処理結果送信
    echo json_encode(AddUser($userID, md5($password),$authority));
    exit;
?>

<?php
    function AddUser($userID, $md5password,$authority){
        $statusCode = calldatabase($userID, $md5password,$authority);
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
    function calldatabase($userID, $md5password,$authority){
        //DB接続
        require_once("../../../inc/inquiry.inc");
        //インデックス計算
        $userNumber = 1;
        $sql = "SELECT max(userNumber) FROM t_userdata;";
        error_log("$sql");
        $rst = $dbh->query($sql);
        if($row = $rst->fetch(PDO::FETCH_NUM)){
            $userNumber =  $row[0] + 1;
        }

        //ユーザー登録
        $sql = "INSERT INTO t_userdata VALUES (".$userNumber.",'".$userID."',".$authority.",'".$md5password."',0);";
        error_log("$sql");
        //SQL発行
        $insert = $dbh->exec($sql);
        //出力結果確認
        error_log("$insert"-1);
        return "$insert"-1;
    }
 ?>
