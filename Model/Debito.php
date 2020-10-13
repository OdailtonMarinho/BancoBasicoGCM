<?php
	class Debito implements ICommand
	{
		protected $valor;
		public __construct($_conta)
		{
			parent::__construct($_conta);
		} 

		public function execute()
		{
			return $_conta::debito($valor);
		}
	}
?>