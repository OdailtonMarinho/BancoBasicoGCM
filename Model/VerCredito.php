<?php
	class VerCredito implements ICommand
	{
		protected $conta;
		public function __construct($_n_conta)
		{
			if(SaveData::get_conta($_n_conta) == false) return false;

			$c = SaveData::get_conta($_n_conta);
			$d = new Conta($c->nome, $c->cpf, $c->numero_conta, $c->saldo, $c->credito, $c->agencia);
			$this->conta = $d;
		}

		public function execute()
		{
			if($this->conta == null) return false;

			return $this->conta->ver_credito();
		}
	}
?>