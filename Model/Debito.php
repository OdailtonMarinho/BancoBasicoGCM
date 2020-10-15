<?php
	class Debito extends ICommand
	{
		protected $valor;
		protected $n_conta;

		public function __construct($_numero_conta, $_valor)
		{
			//parent::__construct($_conta);
			var_dump($_numero_conta);
			$c = SaveData::get_conta($_numero_conta);
			$d = new Conta($c->nome, $c->cpf, $c->numero_conta, $c->saldo, $c->agencia);
			$this->conta = $d;
			$this->valor = $_valor;
			var_dump($c->saldo);
		} 

		public function execute()
		{
			return $this->conta->debito($this->valor);
		}
	}
?>