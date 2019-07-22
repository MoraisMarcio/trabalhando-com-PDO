<?php 
/**
*<b> Read.class:</b>
*Classe responsável por leituras genéricas no banco de dados.	
*/
class Read extends Conn {
	private $Select;
	private $Places;
	private $Result;

	/** @var PDOStatement */
	private $Read;
	/** @var PDO */
	private $Conn;

	public function ExeRead($Tabela, $Termos = null, $ParseString = null) 
	{
		if(!empty($ParseString)){
			//$this->Places = $ParseString;
			parse_str($ParseString, $this->Places);
		}

		$this->Select = "SELECT * FROM {$Tabela} {$Termos}";
		$this->Execute();
	}

	public function getResult()
	{
		return $this->Result;
	}

	public function getRowCount(){
		return $this->Read->rowCount();
	}

	public function fullRead($Query, $ParseString = null){
		$this->Select = (string) $Query;

		if(!empty($ParseString)){
			//$this->Places = $ParseString;
			parse_str($ParseString, $this->Places);
		}

		$this->Execute();
	}

	public function setPlaces($ParseString){
		parse_str($ParseString, $this->Places);
		$this->Execute();
	}

	/**
	*	*************************************************
	*	**************** MÉTODOS PRIVADOS ***************
	*	*************************************************
	*/

	private function Connect()
	{
		$this->Conn = parent::getConn();
		$this->Read = $this->Conn->prepare($this->Select);
		$this->Read->setFetchMode(PDO::FETCH_ASSOC);
	}

	private function getSyntax()
	{
		if ($this->Places) {
			foreach ($this->Places as $Vinculo => $Valor) {
				if ($Vinculo == 'limit' || $Vinculo == 'offset') {
					$Valor = (int) $Valor;
				}
				$this->Read->bindValue(":{$Vinculo}", $Valor, (is_int($Valor) ? PDO::PARAM_INT : PDO::PARAM_STR));
			}
		}
	}

	private function Execute()
	{
		$this->Connect();
		try {
			$this->getSyntax();
			$this->Read->execute();
			$this->Read = $this->Read->fetchAll();
			
		} catch (PDOException $e) {
			$this->Result = null;
				//WSErro("<b>Erro ao cadastrar:</b> {$e->getMessage()}", e->getCode());
			echo "ERRO!";
		}
	}

}

?>
