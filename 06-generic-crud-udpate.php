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
'senha' => 'a', 'arquiteto' => '1', 'lojista' => '0', 'cod_ativacao' => '0', 'status' => '0'
];

$update = new Update;
$update->ExeUpdate('logins', $Dados, "WHERE email = :email", 'email=marciu_morais@hotmail.com');

if ($update->getRowCount()>0) {
	echo $update->getRowCount() ." registro(s) atualizado(s) com sussesso!<hr>";
}else{
	echo "Não foi possível atualizar os dados informados!<hr>";
}

$update->setPlaces('email=a@a');

 ?>
</body>
</html>