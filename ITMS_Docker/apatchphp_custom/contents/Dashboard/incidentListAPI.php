<?php
    //incidentListAPI
    header("Content-Type: application/json; charset=UTF-8");
    //POSTされた値の取得
    $userID = filter_input(INPUT_POST, 'userID');

    //jsonオブジェクトエンコード,送信
    echo json_encode(getIncidentList($userID));
    exit;
?>
<?php
    //インシデントリスト取得
    function getIncidentList($userID){
    //DB問い合わせ
    $incidentList = calldatabase($userID);

    //送信データ生成,リターン
    //return makeInfo($incidentList);
    return $incidentList;
    }
    //レスポンス用JSON生成
    function makeInfo($userID, $statusCode){
        $result = array(
        "user" => $userID,
        "statusCode" => $statusCode) ;
        return $result;
    }
?>

<?php
    //ユーザー認証DB問合せ
    function calldatabase($userID){
        //DB接続
        require_once("../../inc/inquiry.inc");
        //SQL生成
        //$sql = "SELECT * FROM t_incidentdata WHERE closedFlag = 0;";
        $sql = "SELECT incidentNumber, servce, severity, incidentName,brief,recodeTime,updateTime FROM t_incidentdata WHERE closedFlag = 0;";
        error_log("$sql");
        $prepare = $dbh->prepare($sql);
        //SQL発行
        $prepare->execute();
        //出力結果確認
        $incidentList = [];
        while($row = $prepare->fetch(PDO::FETCH_ASSOC)){
            $incidentList[] = $row;
            //error_log($row['incidentNumber']."  ".$row['incidentName']."  ".$row['severity']);
        }
        return $incidentList;
    }
 ?>
