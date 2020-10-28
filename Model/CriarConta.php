<?php
	class CriarConta implements ICommand
	{
		protected $conta;
		public function __construct($_nome, $_cpf, $_numero_conta, $_saldo_inicial, $_credito_inicial, $_agencia)
		{
			$this->conta = new Conta();

			$this->conta->nome = $_nome;
			$this->conta->cpf = $_cpf;
			$this->conta->numero_conta = $_numero_conta;
			$this->conta->saldo = $_saldo_inicial;
			$this->conta->credito = $_credito_inicial;
			$this->conta->agencia = $_agencia;
		}

		public function execute()
		{
			if($this->conta == null) return false;

			return $this->conta->criar_conta();
		}
	}
?>