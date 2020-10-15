<?php
	class Transferencia extends ICommand
	{
		protected $beneficiario;
		protected $valor;
		protected $conta;
		public function __construct($_numero_conta, $_beneficiario, $_valor)
		{
			$c = SaveData::get_conta($_numero_conta);
			$d = new Conta($c->nome, $c->cpf, $c->numero_conta, $c->saldo, $c->agencia);
			$this->conta = $d;
			$this->beneficiario = $_beneficiario;
			$this->valor = $_valor;
		}
		public function execute()
		{
			return $this->conta->transferencia($this->beneficiario, $this->valor);
		}
	}
?>