<?php 
/**
*<b> Create.class:</b>
*Classe responsável por cadastros genéricos no banco de dados.	
*/
class Create extends Conn {
	private $Tabela;
	private $Dados;
	private $Result;

	/** @var PDOStatement */
	private $Create;
	/** @var PDO */
	private $Conn;

	public function ExeCreate($Tabela, array $Dados) 
	{
		$this->Tabela = (string) $Tabela;
		$this->Dados = $Dados;

		$this->getSyntax();
		$this->Execute();
	}

	public function getResult()
	{
		return $this->Result;
	}

	/**
	*	*************************************************
	*	**************** MÉTODOS PRIVADOS ***************
	*	*************************************************
	*/

	/**
	* <b>ExeCreate:</b> Executa um cadastro simplificado no banco de dados utilizando prepared statments.
	* Informar o nome da tabela e um array atribuitivo com nome da coluna e valor.
	*
	* @param STRING $Tabela = Informe o nome da tabela no banco.
	* @param ARRAY $Dados = Informe um array atribuitivo. ( Nome da Coluna => Valor ).
	*/
	private function Connect()
	{
		$this->Conn = parent::getConn();
		$this->Create = $this->Conn->prepare($this->Create);
	}

	private function getSyntax()
	{
		$Fileds = implode(', ', array_keys($this->Dados));
		$Places = ':' . implode(', :', array_keys($this->Dados));
		$this->Create = "INSERT INTO {$this->Tabela} ({$Fileds}) VALUES ({$Places})";
	}

	private function Execute()
	{
		$this->Connect();
		try {
			$this->Create->execute($this->Dados);
			$this->Result = $this->Conn->lastInsertId();
		} catch (PDOException $e) {
			$this->Result = null;
				//WSErro("<b>Erro ao cadastrar:</b> {$e->getMessage()}", e->getCode());
			echo "ERRO!";
		}
	}

}

?>
