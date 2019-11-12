<?php
    //incidentInfoAPI
    header("Content-Type: application/json; charset=UTF-8");
    //POSTdata
    $incidentNumber = filter_input(INPUT_POST, 'incidentNumber');
    error_log("Info"."$incidentNumber");

    //SET incidentNumber
    $redis = new Redis();
    $redis->connect('itms_docker_radis_1', 6379);
    $redis->set('incidentNumber', $incidentNumber);

    //jsonsend
    echo json_encode(getIncidentInfo($incidentNumber));
    exit;
?>
<?php
    //incident
    function getIncidentInfo($incidentNumber){
    //DB accsess
    $incidentInfo = calldatabase($incidentNumber);


    return $incidentInfo;
    }
?>
<?php
    //
    function calldatabase($incidentNumber){
        //DB
        require_once("../../inc/inquiry.inc");
        //SQL
        $sql = "SELECT * FROM t_incidentdata WHERE incidentNumber = ?;";
        error_log("$sql");
        $prepare = $dbh->prepare($sql);
        $prepare->bindValue(1, $incidentNumber, PDO::PARAM_STR);
        //SQL逋ｺ陦
        $prepare->execute();
        //
        while($row = $prepare->fetch(PDO::FETCH_ASSOC)){
            return $row;
            //error_log($row['incidentNumber']."  ".$row['incidentName']."  ".$row['severity']);
        }
        return "1";
    }
 ?>
