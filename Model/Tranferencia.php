<?php
	class Transferencia implements ICommand
	{
		protected $beneficiario;
		protected $valor;
		public __construct($_conta)
		{
			parent::__construct($_conta);
		}
		public function execute()
		{
			return $_conta::transferencia($beneficiario, $valor);
		}
	}
?>