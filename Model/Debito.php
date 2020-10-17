<?php
	class Debito implements ICommand
	{
		protected $valor;
		protected $conta;

		public function __construct($_numero_conta, $_valor)
		{
			if(SaveData::get_conta($_numero_conta) == false) return false;
			$c = SaveData::get_conta($_numero_conta);
			$d = new Conta($c->nome, $c->cpf, $c->numero_conta, $c->saldo, $c->agencia);
			$this->conta = $d;
			$this->valor = (double)$_valor;
			var_dump($c->saldo);
		} 

		public function execute()
		{
			if ($this->valor == null || $this->conta == null) return false;

			return $this->conta->debito($this->valor);
		}
	}
?>