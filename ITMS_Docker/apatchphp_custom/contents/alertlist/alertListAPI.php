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
    //MongoDB問い合わせ
    $AlertListSet = calldatabase("1");
    $AlertListUnset = calldatabase("-");
    $AlertList = [$AlertListSet, $AlertListUnset];

    //送信データ生成,リターン
    return $AlertList;
    }
?>

<?php
    function calldatabase($i_filter){
    error_log($i_filter);
    //MongoDB接続
    $mongo = new MongoDB\Driver\Manager("mongodb://root:mongo@itms_docker_mongodb_1:27017");
    //検索条件指定(incidentNumber判定)
    $filter = ['incidentNumber' => $i_filter];
    error_log(print_r($filter, true));

    //クエリ生成
    $query  = new MongoDB\Driver\Query($filter);
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
