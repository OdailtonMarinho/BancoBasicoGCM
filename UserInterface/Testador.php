<?php
	include '../Model/BancoController.php';



	$conta1 = new CriarConta('cliente', '123456789', '14785-8', 150, '456-8');
	$conta2 = new CriarConta('usuario', '555555555', '252525', 5000, '555-5');
	$conta1->execute();
	$conta2->execute();

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

	$t2 = new Transferencia('121212', '55485', 67);
	if($t2->execute() == false) echo 'faiô transferência </br>';

	$d2 = new Debito('124578', 66);
	if($d2->execute() == false) echo 'faiô debito </br>';

	$d3 = new Debito('252525', -50);
	if($d3->execute() == false) echo 'faiô debito </br>';

	$d3 = new Debito('14785-8', 100000);
	if($d3->execute() == false) echo 'faiô debito </br>';

	$s = new Saldo('adfasdsa');
	if($s->execute() == false) echo 'faiô saldo </br>';


?>