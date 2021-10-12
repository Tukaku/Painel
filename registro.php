<?php
	require_once 'classes/usuarios.php';
	$u = new Usuario;
?>




<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
	<title>Hello, world!</title>
  </head>
  <body>
   
<body style="background-color:powderblue;">
   
   <div class="card" id="telaLogin" style="width: 18rem;">

  <div class="card-body">
<h1> Cadastro</h1>
  <form method="POST">
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" name="nome" placeholder="Ex: Matheus" maxlength="30">
  </div>
  <div class="form-group">
    <label for="sobrenome">Sobrenome</label>
    <input type="text" class="form-control" name="sobrenome" aria-describedby="SobrenomeHelp" placeholder="Ex: Vieira" maxlength="30">
    <small id="SobrenomeHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="email">E-mail</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="exemplo@gmail.com" maxlength="40">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" class="form-control" name="senha" placeholder="Insira sua senha" maxlength="15">
  </div>
  <div class="form-group">
    <label for="password">Confirmar senha</label>
    <input type="password" class="form-control" name="confSenha" placeholder="Insira sua senha novamente" maxlength="15">
  </div>
  <br>
 
  <input type="submit" class="btn btn-warning">
  <a href="index.php"><input type="button" class="btn btn-primary" value="Voltar" onClick="history.go(-1)"></a>
  <input type="button" class="btn btn-dark" value="Limpar" onClick="history.go(0)"> 
  
</form>
  
  
  </div>

  <?php
   
   if(isset($_POST['nome']))
   {
	$nome = ($_POST['nome']);
	$sobrenome = ($_POST['sobrenome']);
	$email = ($_POST['email']);
	$senha = ($_POST['senha']);
	$confirmarSenha = ($_POST['confSenha']);
	
	if(!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
	
	{
		$u->conectar("projeto_login","localhost","root","");
		if($u->msgErro =="")
		{
				if($senha == $confirmarSenha)
				{
				if($u->cadastrar($nome,$sobrenome,$email,$senha))
				{
					?>
					<div class="alert alert-dark">
					Cadastrado com Sucesso! Acesse sua conta
					</div>
					<?php
				}
				else
				{
					?>
					<div class="alert alert-danger">
					E-mail já cadastrado!
					
					</div>
					<?php
				}
			}
			else
			{	
				echo "Senha e confirmar senha não correspondem";
			}	
		}
		else
		{	
		echo "Erro: ".$u->msgErro;	
		}
	}else
	{
	?>
					<div class="alert alert-success">
					Preencha todos os campos!
					</div>
					<?php
	}
}

   ?>
   
  </body>
</html>