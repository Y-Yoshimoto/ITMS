<?php
    //alertListAPI
    header("Content-Type: application/json; charset=UTF-8");
    //送信された値の取得
    //jsonオブジェクトエンコード,送信
    echo json_encode(getAlertList());
    exit;
?>

<?php
    //インシデントリスト取得
    function getAlertList(){
    //Get incidentNumber
    $redis = new Redis();
    $redis->connect('radis', 6379);
    $incidentNumber = $redis->get('incidentNumber');
    error_log("Alert"."$incidentNumber");

    //MongoDB問い合わせ
    $AlertListSet = calldatabase();
    $AlertList = [$AlertListSet];
    //送信データ生成,リターン
    return $AlertList;
    }
?>

<?php
    function calldatabase(){
    //MongoDB接続
    $mongo = new MongoDB\Driver\Manager("mongodb://root:mongo@itms_docker_mongodb_1:27017");
    //検索条件指定(incidentNumber判定)

    //クエリ生成
    $query  = new MongoDB\Driver\Query([]);
    //空オブジェクト生成追加
    $AlertList = array();
    //$AlertList = new ArrayObject();
    foreach( $mongo->executeQuery( 'alertlist.alert', $query) as $article ){
        //$AlertList->append( $article );
        array_push($AlertList,$article);
    }
    return $AlertList;
    }
?>
