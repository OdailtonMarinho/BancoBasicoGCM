<?php
	class Saldo extends ICommand
	{
		protected $conta;
		public function __construct($_n_conta)
		{
			$c = SaveData::get_conta($_n_conta);
			$d = new Conta($c->nome, $c->cpf, $c->numero_conta, $c->saldo, $c->agencia);
			$this->conta = $d;
		}

		public function execute()
		{
			return $this->conta->ver_saldo();
		}
	}
?>