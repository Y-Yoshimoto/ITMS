<?php
    header("Content-Type: application/json; charset=UTF-8");
    //POST縺輔ｌ縺溷､縺ｮ蜿門ｾ
    $incidentName = filter_input(INPUT_POST, 'incidentName');
    $servce = filter_input(INPUT_POST, 'servce');
    $severity = filter_input(INPUT_POST, 'severity');
    $brief = filter_input(INPUT_POST, 'brief');
    $handling = filter_input(INPUT_POST, 'handling');
    $remark = filter_input(INPUT_POST, 'remark');
    $incidenInfo=[$incidentName, $servce, $severity, $brief, $handling, $remark];
    //繧､繝ｳ繧ｷ繝�Φ繝育匳骭ｲ
    //json繧ｪ繝悶ず繧ｧ繧ｯ繝医お繝ｳ繧ｳ繝ｼ繝,騾∽ｿ｡
    echo json_encode(registrationIncident($incidenInfo));
    exit;
?>
<?php
    //繧､繝ｳ繧ｷ繝�Φ繝育匳骭ｲ
    function registrationIncident($incidenInfo){
    //DB蝠上＞蜷医ｏ縺
    $statusCode = calldatabase($incidenInfo);
    error_log("StatusCode:"."$statusCode");
    //騾∽ｿ｡繝��繧ｿ逕滓�,繝ｪ繧ｿ繝ｼ繝ｳ
    return makeInfo($statusCode);
    }
    //繝ｬ繧ｹ繝昴Φ繧ｹ逕ｨJSON逕滓�
    function makeInfo($statusCode){
        $result = array(
        "statusCode" => $statusCode) ;
        return $result;
    }
?>

<?php
    //DB逋ｻ骭ｲ
    function calldatabase($iInfo){
        //DB謗･邯
        require_once("../../inc/inquiry.inc");
        //繧､繝ｳ繝�ャ繧ｯ繧ｹ險育ｮ
        $incidentNumber = 1;
        $sql = "SELECT max(incidentNumber) FROM t_incidentdata;";
        error_log("$sql");
        $rst = $dbh->query($sql);
        if($row = $rst->fetch(PDO::FETCH_NUM)){
            $incidentNumber =  $row[0] + 1;
        }

        //繧､繝ｳ繧ｷ繝�Φ繝育匳骭ｲ
        $nowTime = date("Y-m-d H:i:s");
        $sql = "INSERT INTO t_incidentdata VALUES (".$incidentNumber.",'".$iInfo[1]."', 1, '".$iInfo[2]."','".$iInfo[0]."','".$iInfo[3]."','".$iInfo[4]."','".$iInfo[5]."','$nowTime','$nowTime', 0);";
        error_log("$sql");
        //SQL逋ｺ陦
        $insert = $dbh->exec($sql);
        //蜃ｺ蜉帷ｵ先棡遒ｺ隱
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