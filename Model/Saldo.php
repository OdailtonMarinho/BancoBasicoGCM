<?php
	class Saldo implements ICommand
	{
		public __construct($_conta)
		{
			parent::__construct($_conta);
		}

		public function execute()
		{
			return $_conta::ver_saldo();
		}
	}
?>