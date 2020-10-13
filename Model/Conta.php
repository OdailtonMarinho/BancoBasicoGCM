<?php
	inlude 'Agencia';
	class Pessoa
	{
		private $cpf;
		private $nome;
	}

	class Conta extends Pessoa
	{
		private $numero_conta;
		private $saldo;
		private $agencia;

		public function ver_saldo()
		{
			return $saldo;
		}

		public function debito($valor)
		{
			if ($valor < $saldo) return false;

			$saldo -= $valor;
			return true;
		}

		public function transferencia($beneficiario, $valor)
		{
			if (debito($valor)) return false;

			$beneficiario.$saldo += valor;
			return true;
		}
	}
?>