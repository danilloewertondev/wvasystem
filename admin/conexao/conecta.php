<?php 
	/*wvasystem_bd.mysql.dbaas.com.br (179.188.16.67)*/
	try{
	
		/*conecção com o banco de dados*/
		$conexao = new PDO('mysql:host=wvasystem_bd.mysql.dbaas.com.br;dbname=wvasystem_bd', 'wvasystem_bd', 'danillotorres');
		/*faz parte para fazer a conexão*/
		$conexao ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	}catch(PDOException $error){
			echo 'ERROR: ' . $error ->getMessage();
		}
		
		
		
		/*conexao local
	
		$conexao = new PDO('mysql:host=localhost;dbname=wvasystem', 'root', '');
		
		$conexao ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	}catch(PDOException $error){
			echo 'ERROR: ' . $error ->getMessage();
		}
		
		
		*/
?>