<?php
	class SaveData
	{
		public static function write_conta($nome, $numero_conta, $agencia)
		{
			$str_data = '{nome:'.$nome.',numero_conta:'.$numero_conta.',agencia:'.$agencia.'}';

			$file = fopen('DataBase.json', 'w');
			fwrite($file, $str_data);
		}
	}
?>