<?php session_start(); ?>

<?php $title ="アラートリスト";$pagecss ="../alertlist/page.css"; require '../component/header.php';?>
<!-- navbar -->
<?php require '../component/navbar.php';?>

<?php
    echo '<h1>Echo Alertlist<br></h1>';
    $mongo = new MongoDB\Driver\Manager("mongodb://root:mongo@itms_docker_mongodb_1:27017");

        print_r($mongo);
        echo'<br>';

	    $query  = new MongoDB\Driver\Query( [] );
	    print_r($query );
	        echo'<br>';
	        $List = new ArrayObject();
		    foreach( $mongo->executeQuery( 'alertlist.alert', $query) as $article ){
			            print_r( $article );
				            $List->append( $article );
				            echo'<br>';
					        }
		    print_r( $List );
?>
<?php
		    echo '<br><h1>Session<br></h1>';
		        $redis = new Redis();
		        $redis->connect('radis', 6379);
			    $allKeys = $redis->keys('*');
			    print_r( $allKeys );
			            echo'<br>';


			            echo "save_handler=" . ini_get("session.save_handler") . "\n";
				            echo "save_path=" . ini_get("session.save_path") . "\n";
				            echo "session_id=" . session_id() . "\n";

					            $_SESSION['libname'] = "PhpRedis";
?>


<!--jquery, Bootstrap, popper -->
<?php require '../component/inclode.php'; ?>
<!-- include JavaScript
<script src="./alertlistAPICall.js"></script> -->
<!--footer -->
<?php require '../component/footer.php'; ?>
