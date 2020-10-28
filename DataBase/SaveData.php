<?php
	class SaveData
	{
		//protected $data_base_dir = '../DataBase/Contas';

		public static function write_conta($nome, $cpf, $numero_conta, $saldo, $credito, $agencia)
		{
			$files = scandir('../DataBase/Contas');

			$nova_conta_data = fopen('../DataBase/Contas/'.$numero_conta, 'w');
			fwrite($nova_conta_data, $nome.' ');
			fwrite($nova_conta_data, $cpf.' ');
			fwrite($nova_conta_data, $numero_conta.' ');
			fwrite($nova_conta_data, $saldo.' ');
			fwrite($nova_conta_data, $credito.' ');
			fwrite($nova_conta_data, $agencia.' ');
		}

		public static function get_conta($numero_conta)
		{
			$contas = scandir('../DataBase/Contas');

			foreach($contas as $conta)
			{
				if($conta == $numero_conta) 
				{
					$d = file('../DataBase/Contas/'.$conta);
					$c = explode(" ", $d[0]);

					$conta_data = new Conta($c[0], $c[1], $c[2], $c[3], $c[4], $c[5]);
					return $conta_data;
				}
			}

			return false;
		}

		public static function change_credito($numero_conta, $novo_credito)
		{
			$contas = scandir('../DataBase/Contas');

			foreach($contas as $conta)
			{
				if($conta == $numero_conta) 
				{
					$d = file('../DataBase/Contas/'.$conta);
					$c = explode(' ', $d[0]);

					$c_file = fopen('../DataBase/Contas/'.$conta, 'w');
					fwrite($c_file, $c[0].' ');
					fwrite($c_file, $c[1].' ');
					fwrite($c_file, $c[2].' ');
					fwrite($c_file, $c[3].' ');
					fwrite($c_file, $novo_credito.' ');
					fwrite($c_file, $c[5].' ');
				}
			}

			return false;
		}

		public static function change_saldo($numero_conta, $novo_valor)
		{
			$contas = scandir('../DataBase/Contas');
			foreach($contas as $conta)
			{
				if ($conta == $numero_conta)
				{
					$d = file('../DataBase/Contas/'.$conta);
					$c = explode(' ', $d[0]);

					$c_file = fopen('../DataBase/Contas/'.$conta, 'w');
					fwrite($c_file, $c[0].' ');
					fwrite($c_file, $c[1].' ');
					fwrite($c_file, $c[2].' ');
					fwrite($c_file, $novo_valor.' ');
					fwrite($c_file, $c[4].' ');
					fwrite($c_file, $c[5].' ');

					return true;
				}
			}

			return false;
		}
	}
?>