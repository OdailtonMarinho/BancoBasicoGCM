<?php
	include './Model/BancoController.php';

	echo 'Esvaziando o DataBase para realizar os testes... </br>';

	$file = fopen('./DataBase.json', 'w');
	fwrite($file, '');
	fclose($file);

	$conta1 = new Conta('cliente', '123456789', '14785-8', 150, '456-8');
	$conta2 = new Conta('usuario', '555555555', '252525', 5000, '555-5');
	$conta1->criar_conta();
	$conta2->criar_conta();

	echo 'Adicionadas duas contas ao DataBase. </br>';

	$debito = new Debito('252525', 1000);
	echo 'Debitado 1000$ da conta de numero 252525. </br>';
	$debito->execute();

	$saldo = new Saldo('252525');
	$saldo_conta2 = $saldo->execute();

	echo 'Mostrando Novo Saldo da Conta de numero 252525: ' . $saldo_conta2 . '$ </br>';

	echo 'Realizando Transferencia de 50 reais da conta(14785-8) para a conta(252525): </br>';
	$transf = new Transferencia('14785-8', '252525', 50);
	$transf->execute();


?>