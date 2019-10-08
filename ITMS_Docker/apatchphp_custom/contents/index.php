<!DOCTYPE html>
<html lang="jp" dir="ltr">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./style.css">
	<title>PHP_index</title>
</head>
<!--Body-->
<body>
    <div class="phpClass">
    <div class="Linklist">
        <?php echo 'PHP Index Page.'; ?><br>
        <a href="./login/">login</a><br>
        <a href="./Dashboard/">Dashboard</a><br>
        <a href="./registration/">registration</a><br>
    </div>
    <?php phpinfo(); ?>
</body>
</html>
