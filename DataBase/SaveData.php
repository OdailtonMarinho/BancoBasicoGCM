<?php
	class SaveData
	{
		public static function write_conta($nome, $cpf, $numero_conta, $saldo, $agencia)
		{
			$data = array('nome'=>$nome, 'cpf'=>$cpf, 'numero_conta'=>$numero_conta, 'saldo'=>$saldo, 'agencia'=>$agencia);

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
				if($json_conta->numero_conta == $numero_conta) return $json_conta;
			}

			return false;
		}

		public static function change_saldo($numero_conta, $novo_valor)
		{
			$arr_data = file('DataBase.json');

			$i = 0;
			foreach($arr_data as $conta)
			{
				$json_conta = json_decode($conta);
				if($json_conta->numero_conta == $numero_conta) 
				{
					$json_conta->saldo = $novo_valor;
					$conta = json_encode($json_conta);
					
					array_push($arr_data, $conta);
					unset($arr_data[$i]);
					file_put_contents('DataBase.json', implode("", $arr_data));
				}
				$i = $i + 1;
			}

			return false;
		}
	}
?>