<?php 

	require_once 'classes/usuarios.php';
	$u = new Usuario;
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<title>Hello, world!</title>
  </head>
  <body>
   
<body style="background-color:powderblue;">
   
   <div class="card" id="telaLogin" style="width: 18rem;">

  <div class="card-body">
<h1> Painel</h1>
  <form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail">E-mail</label>
    <input type="email" name="email" class="form-control" placeholder="exemplo@gmail.com">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Senha</label>
    <input type="password" name="senha" class="form-control" placeholder="Insira sua senha">
	 </div>
	<input type="checkbox" onclick="show()" class="btn btn-primary" placeholder="Insira sua senha"> Mostrar senha
	
 
  <div class="form-check">
   <span class="psw"><a href="resgatar.php">Esqueceu a senha?</a></span>
  </div>
<br>
 <input type="submit" class="btn btn-dark">
</input>

<a href="registro.php" class="btn btn-warning">Registrar-se</button></a>
</form>
<br>

 <center><div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-dark btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i>
		
		 <a class="btn btn-outline-dark btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i>
		
		<a class="btn btn-outline-dark btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-github"></i>
		
	  </a>

   <script>
  function show() {
  var senha = document.getElementById("senha");
  if (senha.type === "password") {
    senha.type = "text";
  } else {
    senha.type = "password";
  }
}
</script>
</div>
<?php
   if(isset($_POST['email']))
   {
	$email = ($_POST['email']);
	$senha = ($_POST['senha']);
	
	if(!empty($email) && !empty($senha))
	{
	 $u->conectar("projeto_login","localhost","root","");
	 if($u->msgErro =="")
	 {
	 if($u->logar($email,$senha))
	 {
		header("location: painel.php");
	 }
	 else
	 {
		 echo "E-mail e/ou senha estão incorretos!";
	 }
}
else
{
	echo "Erro: ".$u->msgErro;
}
	}else
	{
		?>
					<div class="alert alert-danger">
					Preencha todos os campos!
					
					</div>
					<?php
	}
}
?>
 </body>
</html>