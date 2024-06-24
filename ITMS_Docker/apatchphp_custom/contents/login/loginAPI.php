<?php
    header("Content-Type: application/json; charset=UTF-8");
    //POSTされた値の取得
    $userID = filter_input(INPUT_POST, 'userID');
    $password = filter_input(INPUT_POST, 'password');

    //ユーザー,パスワード確認
    //jsonオブジェクトエンコード,送信
    echo json_encode(UserCheck($userID, md5($password)));
    exit;
?>
<?php
    //ユーザ認証
    function UserCheck($userID, $md5password){
    error_log("PasswordMD5="."$md5password");
    //DB問い合わせ
    $statusCode = calldatabase($userID, $md5password);
    error_log("User:"."$userID"." LoginStatusCode:"."$statusCode");
    //送信データ生成,リターン
    return makeInfo($userID, $statusCode);
    }
    //レスポンス用JSON生成
    function makeInfo($userID, $statusCode){
        $result = array(
        "user" => $userID,
        "statusCode" => $statusCode) ;
        return $result;
    }
?>

<?php
    //ユーザー認証DB問合せ
    function calldatabase($userID, $md5password){
        //DB接続
        require_once("../../inc/inquiry.inc");
        //SQL生成
        $sql = "SELECT * FROM t_userdata WHERE userid = ?";
        error_log("$sql");
        $prepare = $dbh->prepare($sql);
        $prepare->bindValue(1, $userID, PDO::PARAM_STR);
        //SQL発行
        $prepare->execute();
        //出力結果確認
        while($row = $prepare->fetch(PDO::FETCH_ASSOC)){
            if($row['password'] == $md5password){
                return "0";
            }
            error_log($row['id']."  ".$row['userid']."  ".$row['password']);
        }
        return "1";
    }
 ?>
