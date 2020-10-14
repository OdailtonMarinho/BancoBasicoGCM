<?php
	class SaveData
	{
		public static function write_conta($nome, $numero_conta, $agencia)
		{
			$data = array('nome'=>$nome, 'numero_conta'=>$numero_conta, 'agencia'=>$agencia);

			$str_data = json_encode($data);
			$file = fopen('DataBase.json', 'a');
			fwrite($file, $str_data.PHP_EOL);

			fclose($file);
		}

		public static function get_conta($numero_conta)
		{
			$arr_data = file('DataBase.json');

			foreach($arr_data as $conta)
			{
				$json_conta = json_decode($conta);
				var_dump($json_conta->numero_conta);
				if($json_conta->numero_conta == $numero_conta) return $json_conta;
			}

			return false;
		}
	}
?>