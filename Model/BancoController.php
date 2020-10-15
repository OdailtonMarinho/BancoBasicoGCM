<?php
	include 'ICommand.php';
	include 'Transferencia.php';
	include 'Debito.php';
	include 'Saldo.php';

	class BancoController
	{
		public $comandos;
		public $comandos_size;
		public function __construct()
		{
			$comandos = array();
			$comandos_size = 0;
		}

		public function executar_comandos()
		{
			for ($i = 0; $i < $comandos_size; $i++)
			{
				$comando[$i]->execute();
				unset($comando);
				$comandos_size = 0;
			}
		}
	}
?>