<?php
    //incidentListAPI
    header("Content-Type: application/json; charset=UTF-8");
    //送信された値の取得

    //jsonオブジェクトエンコード,送信
    echo json_encode(getUserList());
    exit;
?>
<?php
    //インシデントリスト取得
    function getUserList(){
    //DB問い合わせ
    $UserList = calldatabase();

    //送信データ生成,リターン
    return $UserList;
    }
?>

<?php
    //インシデント情報リスト取得
    function calldatabase(){
        //DB接続
        require_once("../../inc/inquiry.inc");
        //SQL生成
        $sql = "SELECT userNumber, userid, Authority FROM t_userdata WHERE deleteFlag = 0;";
        error_log("$sql");
        $prepare = $dbh->prepare($sql);
        //SQL発行
        $prepare->execute();
        //出力結果確認
        $UserList = [];
        while($row = $prepare->fetch(PDO::FETCH_ASSOC)){
            $UserList[] = $row;
            //error_log($row['userNumber']."  ".$row['userid']."  ".$row['Authority']);
        }
        return $UserList;
    }
 ?>
