<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php 
require('Conn.class.php');

$conn = new Conn; 
$conn->getConn();

var_dump($conn->getConn());

?>


</body>
</html>