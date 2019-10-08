<?php
    //接続情報
    define('SERVER',"itms_docker_mariadb_1");
    define('USERNAME',"itmsUser");
    define('PASSWORD',"Password");
    define('DABENAME',"itms");
    $DSN = 'mysql:host='.SERVER.';dbname='.DABENAME.';charset=utf8';
    //接続
    try{
        $dbh = new PDO($DSN, USERNAME, PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }catch(PDOException $e){
        $error = $e->getMessage();
        echo $error;
        error_log("$error");
        exit();
    }
 ?>
