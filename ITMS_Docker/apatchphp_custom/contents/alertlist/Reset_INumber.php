<?php
    //alertListAPI
    header("Content-Type: application/json; charset=UTF-8");
    //POSTされた値の取得
    $oid = filter_input(INPUT_POST, 'oid');

    //Reset incidentNumber
    $incidentNumber = '-';

    //MongoDB接続
    error_log("Mongo");
    $mongo = new MongoDB\Driver\Manager("mongodb://root:mongo@itms_docker_mongodb_1:27017");

    //Updateクエリー生成
    $bulk = new MongoDB\Driver\BulkWrite(['ordered' => true]);
    $filter = ['_id' => new MongoDB\BSON\ObjectId($oid)];
    $up = ['$set' =>['incidentNumber' => $incidentNumber]];
    $bulk->update($filter, $up);
    //クエリー発行
    $mongo->executeBulkWrite('alertlist.alert', $bulk);

    error_log("_id:  ".$oid);
    error_log("incidentNumber:  ".$incidentNumber);
    //$filter = ['oid' => $oid];
    //$filter = ['_id' => new MongoDB\BSON\ObjectId($oid)];
    //$bulk = ['incidentNumber' => $incidentNumber];

    //$mongo->update($filter, $bulk);
    error_log("END");

    echo json_encode(0);
    exit;
?>
