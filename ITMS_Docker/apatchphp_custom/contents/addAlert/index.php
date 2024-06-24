<?php
    header("Content-Type: application/json; charset=UTF-8");
    //POSTされた値の取得
    $json_string = file_get_contents('php://input');
    error_log($json_string);
    $contents = json_decode($json_string, true);

    //受信データ整形
    $Alert = "{".$contents['Senddata']['Service'].",".$contents['Senddata']['Subject'].",".$contents['Senddata']['Message']."}";
    error_log("Alert");
    error_log(print_r($Alert, true));
    $AlertArray = json_decode($Alert, true);
    error_log($AlertArray);
    error_log(print_r($AlertArray, true));

    //MongoDB接続
    error_log("Mongo");
    $mongo = new MongoDB\Driver\Manager("mongodb://root:mongo@itms_docker_mongodb_1:27017");
    error_log(print_r($mongo, true));

    // Insert
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert($AlertArray);
    $mongo->executeBulkWrite('alertlist.alert', $bulk);
    error_log("END");
    //処理結果送信
    exit;



//"severity":"{EVENT.SEVERITY}","Hostname":"{HOST.NAME}","alertBrief":"{ITEM.NAME1} {ITEM.LASTVALUE}","alertTime":"{EVENT.DATE} {EVENT.TIME}","eventID":"{EVENT.ID}","incidentNumber":"0"?>
