<?php
	include '../Model/BancoController.php';

	$debito_command = new Debito($_POST['n_conta'], $_POST['valor']);
	$debito = $debito_command->execute();

	if($debito == false) echo 'Algo de errado ocorreu, confira se o número da conta está correto e se a conta possui saldo suficiente ou se um valor válido foi inserido.';

	else echo 'Debitado ' . $_POST['valor'] . '$ da conta: ' . $_POST['n_conta'];

?>