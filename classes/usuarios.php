<?php

class Usuario
{
	private $pdo;
	public $msgErro = "";

	public function conectar($nome, $host, $usuario, $senha)
	{
		global $pdo;
		try 
		{
		$pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
		} catch (PDOException $e) {
			$msgErro = $e->getMessage();
	}
}
	public function cadastrar($nome, $sobrenome, $email, $senha)
	{
		global $pdo;
		
		$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
		$sql->bindValue(":e",$email);
		$sql->execute();
		if($sql->rowCount() > 0)
		{
			return false;
		}
		else
		{
			
			$sql = $pdo->prepare("INSERT INTO usuarios (nome,sobrenome,email,senha) VALUES (:n, :s, :e, :p)");
			$sql->bindValue(":n",$nome);
			$sql->bindValue(":s",$sobrenome);
			$sql->bindValue(":e",$email);
			$sql->bindValue(":p",md5($senha));
			$sql->execute();
			return true;
		}
		
		
		
	}
	
	public function logar($email, $senha)
	{
		global $pdo;
		
		$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :p");
		$sql->bindValue(":e",$email);
		$sql->bindValue(":p",md5($senha));
		$sql->execute();
		if($sql->rowCount() > 0)
		{
			$dado = $sql->fetch();
			session_start();
			$_SESSION['id_usuario'] = $dado['id_usuario'];
			$_SESSION['email'] = $dado['email'];
			return true;
			
		}
		else	
		{
			return false;
		}
	}
}
	