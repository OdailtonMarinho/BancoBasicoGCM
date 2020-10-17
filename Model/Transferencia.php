<?php
	class Transferencia extends ICommand
	{
		protected $beneficiario;
		protected $valor;
		protected $conta;
		public function __construct($_numero_conta, $_beneficiario, $_valor)
		{
			if (SaveData::get_conta($_numero_conta) == false) return false;
			$c = SaveData::get_conta($_numero_conta);
			$d = new Conta($c->nome, $c->cpf, $c->numero_conta, $c->saldo, $c->agencia);
			$this->conta = $d;
			$this->beneficiario = $_beneficiario;
			$this->valor = $_valor;
		}
		public function execute()
		{
			if($this->conta == null|| $this->beneficiario == null || $this->valor == null) return false;

			return $this->conta->transferencia($this->beneficiario, $this->valor);
		}
	}
?>