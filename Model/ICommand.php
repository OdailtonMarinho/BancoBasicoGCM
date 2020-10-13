<?php
	include 'Conta.php';
	include 'Agencia';

	interface ICommand
	{
		protected $conta;
		public __construct($_conta)
		{
			$conta = $_conta
		}

		public function execute();
	}
?>