<?php
	include 'Conta.php';

	abstract class ICommand
	{
		/*protected $conta;
		public function __construct($_conta)
		{
			$this->conta = $_conta;
		}

		protected function get_conta() { return $this->conta; }*/

		public function execute() {  }
	}
?>