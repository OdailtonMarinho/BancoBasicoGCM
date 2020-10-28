<?php
	include '../Model/BancoController.php';

	$saldo_command = new Saldo($_POST['n_conta']);
	$saldo = $saldo_command->execute();

	$ver_cred_command = new VerCredito($_POST['n_conta']);
	$credito = $ver_cred_command->execute();

	if($saldo == false || $credito == false) echo 'Um erro ocorreu, confira se o número de conta inserido é válido.';

	else echo 'A conta ' . $_POST["n_conta"] . ' tem o Saldo de: ' . $saldo . '$ e Crédito de: ' . $credito;

?>