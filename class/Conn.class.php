<?php 

/**
* Conn.class.php [ CONEXÃO ]
* Classe abstrata de conexão. Padrão Singleton.
* Retorna um objeto PDO pelo método estático getConn();
*
*/
class Conn {
	 private static $Host = "localhost";
	 private static $User = "root";
	 private static $Pass = "";
	 private static $Dbsa = "eurekapublicid";

	 /** @var PDO*/
	 private static $Connect = null;

	 /**
	 * Conecta com o banco de dados com o pattern singleton.
	 * Retorna um objeto PDO.
	 */
	 private static function Conectar()
	 {
	 	try {
	 		if (self::$Connect==null) {
	 			$dsn = 'mysql:host=' . self::$Host . ';dbname=' . self::$Dbsa;
	 			$options = [ PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
	 			self::$Connect = new PDO($dsn, self::$User, self::$Pass, $options);
	 		}
	 		
	 	} catch (PDOExeption $e) {
	 		PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
	 	}

	 	self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 	return self::$Connect;
	 	
	 }

	 //** Retorna um objeto PDO Singleton Pattern*/
	 public static function getConn()
	 {
	 	return self::Conectar();
	 }
	} ?>