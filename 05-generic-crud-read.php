<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php 

require('./inc/Config.inc.php');

$read = new Read;
$read->ExeRead('logins', 'WHERE arquiteto = :arquiteto LIMIT :limit' , "arquiteto=1&limit=3");
var_dump($read);
echo "<hr>";

$read->setPlaces('arquiteto=1&limit=3');

var_dump($read);
echo "<hr>";

$read->fullRead("SELECT * FROM logins LIMIT :limit", "limit=2");

var_dump($read);


 ?>
</body>
</html>