<?php
	include './DataBase/SaveData.php';

	class Conta
	{
		private $numero_conta;
		private $saldo;
		private $agencia;
		private $nome;
		private $cpf;

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
			/*$nc = SaveData::get_conta($this->numero_conta);
			if($nc == false) return false;

			return $nc->saldo;*/

			return $this->saldo;
		}

		public function debito($valor)
		{
			if ($valor > $this->saldo) return false;
			else if ($valor < 0) return false;

			$this->saldo -= $valor;
			SaveData::change_saldo($this->numero_conta, $this->saldo);

			return true;
		}

		public function transferencia($beneficiario_n_conta, $valor)
		{
			if($this->debito($valor) == false) return false;

			$c = SaveData::get_conta($beneficiario_n_conta);
			$d = new Conta($c->nome, $c->cpf, $c->numero_conta, $c->saldo, $c->agencia);
			$beneficiario = $d;
			if(SaveData::get_conta($beneficiario_n_conta)) return false;

			$beneficiario->saldo += valor;

			SaveData::change_saldo($beneficiario->numero_conta, $beneficiario->saldo);

			return true;
		}
	}
?>