<?php
    //incidentInfoAPI
    header("Content-Type: application/json; charset=UTF-8");
    //POST縺輔ｌ縺溷､縺ｮ蜿門ｾ
    $incidentNumber = filter_input(INPUT_POST, 'incidentNumber');
    error_log("$incidentNumber");
    //json繧ｪ繝悶ず繧ｧ繧ｯ繝医お繝ｳ繧ｳ繝ｼ繝,騾∽ｿ｡
    echo json_encode(getIncidentInfo($incidentNumber));
    exit;
?>
<?php
    //繧､繝ｳ繧ｷ繝�Φ繝医Μ繧ｹ繝亥叙蠕
    function getIncidentInfo($incidentNumber){
    //DB蝠上＞蜷医ｏ縺
    $incidentInfo = calldatabase($incidentNumber);

    //騾∽ｿ｡繝��繧ｿ逕滓�,繝ｪ繧ｿ繝ｼ繝ｳ
    //return makeInfo($incidentList);
    return $incidentInfo;
    }
    /*繝ｬ繧ｹ繝昴Φ繧ｹ逕ｨJSON逕滓�
    function makeInfo($userID, $statusCode){
        $result = array(
        "user" => $userID,
        "statusCode" => $statusCode) ;
        return $result;
    }*/
?>
<?php
    //繧､繝ｳ繧ｷ繝�Φ繝域ュ蝣ｱ蜿門ｾ
    function calldatabase($incidentNumber){
        //DB謗･邯
        require_once("../../inc/inquiry.inc");
        //SQL逕滓�
        $sql = "SELECT * FROM t_incidentdata WHERE incidentNumber = ?;";
        error_log("$sql");
        $prepare = $dbh->prepare($sql);
        $prepare->bindValue(1, $incidentNumber, PDO::PARAM_STR);
        //SQL逋ｺ陦
        $prepare->execute();
        //蜃ｺ蜉帷ｵ先棡遒ｺ隱
        while($row = $prepare->fetch(PDO::FETCH_ASSOC)){
            return $row;
            //error_log($row['incidentNumber']."  ".$row['incidentName']."  ".$row['severity']);
        }
        return "1";
    }
 ?>