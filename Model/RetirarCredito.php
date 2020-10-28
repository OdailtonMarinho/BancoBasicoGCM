<?php
	class RetirarCredito implements ICommand
	{
		protected $conta;
		protected $valor;
		public function __construct($_numero_conta, $_valor)
		{
			if (SaveData::get_conta($_numero_conta) == false) return false;
			$c = SaveData::get_conta($_numero_conta);
			$d = new Conta($c->nome, $c->cpf, $c->numero_conta, $c->saldo, $c->credito, $c->agencia);
			$this->conta = $d;
			$this->valor = $_valor;
		}

		public function execute()
		{
			if($this->conta == null || $this->valor == null) return false;

			return $this->conta->retirar_credito($this->valor);
		}
	}
?>