<?php
	class SaveData
	{
		public static function write_conta($nome, $cpf, $numero_conta, $saldo, $agencia)
		{
			/*$data = array('nome'=>$nome, 'cpf'=>$cpf, 'numero_conta'=>$numero_conta, 'saldo'=>$saldo, 'agencia'=>$agencia);

			$str_data = json_encode($data);
			$file = fopen('DataBase.json', 'a');
			fwrite($file, $str_data.PHP_EOL);

			fclose($file);*/

			$files = scandir('./DataBase/Contas');

			$nova_conta_data = fopen('./DataBase/Contas/'.$numero_conta, 'w');
			fwrite($nova_conta_data, $nome.PHP_EOL);
			fwrite($nova_conta_data, $cpf.PHP_EOL);
			fwrite($nova_conta_data, $numero_conta.PHP_EOL);
			fwrite($nova_conta_data, $saldo.PHP_EOL);
			fwrite($nova_conta_data, $agencia.PHP_EOL);
		}

		public static function get_conta($numero_conta)
		{
			$contas = scandir('./DataBase/Contas');

			foreach($contas as $conta)
			{
				if($conta == $numero_conta) 
				{
					$c = file('./DataBase/Contas/'.$conta);
					$c[0] = str_replace(PHP_EOL, "", $c[0]);
					$c[1] = str_replace(PHP_EOL, "", $c[1]);
					$c[2] = str_replace(PHP_EOL, "", $c[2]);
					$c[3] = str_replace(PHP_EOL, "", $c[3]);
					$c[4] = str_replace(PHP_EOL, "", $c[4]);

					$conta_data = new Conta($c[0], $c[1], $c[2], $c[3], $c[4]);
					return $conta_data;
				}
			}

			return false;

			/*$arr_data = file('DataBase.json');

			foreach($arr_data as $conta)
			{
				$json_conta = json_decode($conta);
				if($json_conta->numero_conta == $numero_conta) return $json_conta;
			}

			return false;*/
		}

		public static function change_saldo($numero_conta, $novo_valor)
		{
			var_dump($numero_conta);
			$contas = scandir('./DataBase/Contas');
			foreach($contas as $conta)
			{
				var_dump($conta);
				if ($conta == $numero_conta)
				{
					$c = file('./DataBase/Contas/'.$conta);

					$c_file = fopen('./DataBase/Contas/'.$conta, 'w');
					fwrite($c_file, $c[0].PHP_EOL);
					fwrite($c_file, $c[1].PHP_EOL);
					fwrite($c_file, $c[2].PHP_EOL);
					fwrite($c_file, $novo_valor.PHP_EOL);
					fwrite($c_file, $c[4].PHP_EOL);

					return true;
				}
			}

			return false;

			/*$arr_data = file('DataBase.json');

			$i = 0;
			//file_put_contents('DataBase.json', '');
			foreach($arr_data as $conta)
			{
				$json_conta = json_decode($conta);
				if($json_conta->numero_conta == $numero_conta) 
				{
					$json_conta->saldo = $novo_valor;
					$conta = json_encode($json_conta);
					
					array_push($arr_data, $conta);
					unset($arr_data[$i]);
					file_put_contents('DataBase.json', $conta, FILE_APPEND);
				}

				//file_put_contents('DataBase.json', $conta);

				$i = $i + 1;
			}*/

			/*$i = 0;

			$f = fopen('DataBase.json', 'w');
			foreach($arr_data as $conta)
			{
				if ($conta != PHP_EOL) fwrite($f, $conta.PHP_EOL);
			}

			fclose($f);*/
		}
	}
?>