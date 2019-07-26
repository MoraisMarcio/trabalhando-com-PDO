<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php 

require('./inc/Config.inc.php');

$Dados = [
'email' => 'c@c', 'senha' => 'a', 'arquiteto' => '1', 'lojista' => '0', 'cod_ativacao' => '0', 'status' => '0'
];

$Cadastra = new Create;
$Cadastra->ExeCreate('logins', $Dados);

var_dump($Cadastra);

 ?>
</body>
</html>