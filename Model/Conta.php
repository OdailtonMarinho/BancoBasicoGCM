<?php
	include '../DataBase/SaveData.php';

	class Conta
	{
		public $numero_conta;
		public $saldo;
		public $agencia;
		public $nome;
		public $cpf;

		public function __construct($_nome='', $_cpf='', $_numero_conta='', $_saldo_inicial='', $_agencia='')
		{
			$this->cpf = $_cpf;
			$this->nome = $_nome;
			$this->numero_conta = $_numero_conta;
			$this->saldo = $_saldo_inicial;
			$this->agencia = $_agencia;
		}

		public function criar_conta()
		{
			SaveData::write_conta($this->nome, $this->cpf, $this->numero_conta, $this->saldo, $this->agencia);
		}

		public function ver_saldo()
		{
			return $this->saldo;
		}

		public function debito($valor)
		{
			if ($valor > $this->saldo) return false;
			else if ($valor < 0) return false;

			$this->saldo = (double)$this->saldo;
			$this->saldo -= $valor;
			SaveData::change_saldo($this->numero_conta, $this->saldo);

			return true;
		}

		public function transferencia($beneficiario_n_conta, $valor)
		{
			if ($valor > $this->saldo) return false;
			else if ($valor < 0) return false;

			$this->saldo = (double)$this->saldo;
			$this->saldo -= $valor;

			$c = SaveData::get_conta($beneficiario_n_conta);
			$d = new Conta($c->nome, $c->cpf, $c->numero_conta, $c->saldo, $c->agencia);
			$beneficiario = $d;

			if(SaveData::get_conta($beneficiario_n_conta) == false) return false;

			$beneficiario->saldo = (double)$beneficiario->saldo;
			$beneficiario->saldo += $valor;

			SaveData::change_saldo($beneficiario->numero_conta, $beneficiario->saldo);
			SaveData::change_saldo($this->numero_conta, $this->saldo);

			return true;
		}
	}
?>