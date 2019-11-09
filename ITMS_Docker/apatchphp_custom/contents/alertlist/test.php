<!--Header -->
<?php $title ="アラートリスト";$pagecss ="../alertlist/page.css"; require '../component/header.php';?>
<!-- navbar -->
<?php require '../component/navbar.php';?>

<?php
    echo 'Echo Alertlist<br>';
    $mongo = new MongoDB\Driver\Manager("mongodb://root:mongo@itms_docker_mongodb_1:27017");

    print_r($mongo);
    echo'<br>';

    $query  = new MongoDB\Driver\Query( [] );
    print_r($query );
    echo'<br>';

    foreach( $mongo->executeQuery( 'alertlist.alert', $query) as $article ){
        print_r( $article );
        echo'<br>';
    }

?>



<!--jquery, Bootstrap, popper -->
<?php require '../component/inclode.php'; ?>
<!-- include JavaScript
<script src="./alertlistAPICall.js"></script> -->
<!--footer -->
<?php require '../component/footer.php'; ?>
