<?php
    header("Content-Type: application/json; charset=UTF-8");
    //POSTされた値の取得
    $incidentNumber = filter_input(INPUT_POST, 'incidentNumber');
    error_log("incidentNumber:"."$incidentNumber");
    $incidentName = filter_input(INPUT_POST, 'incidentName');
    $servce = filter_input(INPUT_POST, 'servce');
    $severity = filter_input(INPUT_POST, 'severity');
    $brief = filter_input(INPUT_POST, 'brief');
    $handling = filter_input(INPUT_POST, 'handling');
    $remark = filter_input(INPUT_POST, 'remark');
    $closedFlag = filter_input(INPUT_POST, 'closedFlag');
    $incidenInfo=[$incidentName, $servce, $severity, $brief, $handling, $remark,$closedFlag];
    //インシデント登録
    //jsonオブジェクトエンコード,送信
    echo json_encode(updateIncident($incidentNumber,$incidenInfo));
    exit;
?>
<?php
    //インシデント登録
    function updateIncident($incidentNumber,$incidenInfo){
    //DB問い合わせ
    $statusCode = calldatabase($incidentNumber,$incidenInfo);
    error_log("StatusCode:"."$statusCode");
    //送信データ生成,リターン
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
    //DB登録
    function calldatabase($iNumber,$iInfo){
        //DB接続
        require_once("../../inc/inquiry.inc");

        //インシデント更新
        $nowTime = date("Y-m-d H:i:s");
        // $sql = "INSERT INTO t_incidentdata VALUES ("..",'".$iInfo[1]."', 1, '".$iInfo[2]."','".$iInfo[0]."','".$iInfo[3]."','".$iInfo[4]."','".$iInfo[5]."','$nowTime','$nowTime', 0);";
        $sql_CRUD = "UPDATE t_incidentdata SET ";
        $sql_SET = $sql_SET."servce = '".$iInfo[1]."', ";
        $sql_SET = $sql_SET."severity = ".$iInfo[2].", ";
        $sql_SET = $sql_SET."incidentName = '".$iInfo[0]."', ";
        $sql_SET = $sql_SET."brief = '".$iInfo[3]."', ";
        $sql_SET = $sql_SET."handling = '".$iInfo[4]."', ";
        $sql_SET = $sql_SET."remark = '".$iInfo[5]."', ";
        $sql_SET = $sql_SET."updateTime = '".$nowTime."', ";
        $sql_SET = $sql_SET."closedFlag = ".$iInfo[6]." ";
        $sql_WHERE = "WHERE incidentNumber = ".$iNumber.";";
        $sql = $sql_CRUD.$sql_SET.$sql_WHERE;
        error_log("$sql");
        //SQL発行
        $insert = $dbh->exec($sql);
        //出力結果確認
        error_log("$insert"-1);
        return "$insert"-1;
    }
 ?>

<!--
 $sql = 'INSERT INTO t_incidentdata VALUES (6,?,1,?,?,?,?,?,?,?,0);';
 error_log("$sql");
 error_log("$iInfo[0]");
 error_log("$iInfo[1]");
 error_log("$iInfo[2]");
 error_log("$iInfo[3]");
 error_log("$iInfo[4]");
 error_log("$iInfo[5]");
 $prepare = $dbh->prepare($sql);

 $prepare->bindValue(1, $iInfo[1], PDO::PARAM_STR);
 $prepare->bindValue(2, $iInfo[2], PDO::PARAM_STR);
 $prepare->bindValue(3, $iInfo[3], PDO::PARAM_STR);
 $prepare->bindValue(4, $iInfo[0], PDO::PARAM_STR);
 $prepare->bindValue(5, $iInfo[4], PDO::PARAM_STR);
 $prepare->bindValue(6, $iInfo[5], PDO::PARAM_STR);
 $nowTime = date("Y-m-d H:i:s");
 $prepare->bindValue(7, $nowTime, PDO::PARAM_STR);
 $prepare->bindValue(8, $nowTime, PDO::PARAM_STR);
 error_log($nowTime);
 error_log("$sql");
-->
