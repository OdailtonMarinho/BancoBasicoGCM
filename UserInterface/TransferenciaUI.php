<?php
	include '../Model/BancoController.php';

	$transf_command = new Transferencia($_POST['transferente'], $_POST['benef'], $_POST['valor']);
	$transf = $transf_command->execute();

	if($transf == false) echo 'Algo de errado ocorreu, confira se o número da conta está correto e se a conta possui saldo suficiente ou se um valor válido foi inserido.';

	else echo 'Transferencia bem sucedida: ' . $_POST['valor'] . '$' . ' da conta ' . $_POST['transferente'] . ' para a conta ' . $_POST['benef'];

?>