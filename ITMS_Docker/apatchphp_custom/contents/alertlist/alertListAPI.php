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
    //DB問い合わせ
    $AlertList = calldatabase();

    //送信データ生成,リターン
    return $AlertList;
    }
?>

<?php
    function calldatabase(){

    $mongo = new MongoDB\Driver\Manager("mongodb://root:mongo@itms_docker_mongodb_1:27017");
    $query  = new MongoDB\Driver\Query( [] );
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