<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php 

require('./inc/Config.inc.php');

$delete = new Delete;
$delete->ExeDelete('logins', 'WHERE email = :email', 'email=c@c');

if ($delete->getResult()) {
	echo $delete->getRowCount() . " registro(s) removidos com sussesso!<hr>";
}

//var_dump($delete);

 ?>
</body>
</html>