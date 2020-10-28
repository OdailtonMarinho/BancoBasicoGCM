<?php
	include '../Model/BancoController.php';

	$credito_command;

	if($_POST['tipo_credito'] == 'dar') $credito_command = new DarCredito($_POST['n_conta'], $_POST['valor']);
	else if ($_POST['tipo_credito'] == 'retirar') $credito_command = new RetirarCredito($_POST['n_conta'], $_POST['valor']);

	$result = $credito_command->execute();

	if($result == false) echo 'ERRO!! Cheque se a conta inserida está correta ou se os valores inseridos para crédito são válidos.';

	else echo 'Operação de Crédito realizada com sucesso!!';

?>