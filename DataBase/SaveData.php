<?php
	class SaveData
	{
		public static function write_conta($conta)
		{
			$str_data = '{"nome":$conta->nome,"numero_conta":"$conta->$numero_conta","agencia":$conta->$agencia}';

			$file = fopen('DataBase.json', 'w');
			$fwrite($file, $str_data);
		}
	}
?>