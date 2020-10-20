<?php
	include '../Model/Conta.php';

	interface ICommand
	{
		public function execute();
	}
?>