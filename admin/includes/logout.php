<?php 
/*se a pessoa clicar no link sair*/
if(isset($_REQUEST['sair'])){
	/*destruir sessão*/
	session_destroy();
	/*faz a limpeza das variaveis*/
	session_unset ($_SESSION['usuariowva']);
	session_unset($_SESSION['senhawva']);
	header("Location: index.php");
	
	}

?>