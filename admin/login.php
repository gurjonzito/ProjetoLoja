<?php
  session_start();
  $usuario = $_POST["usuario"];
  $senha   = $_POST["senha"];
  include_once("../includes/conexao.php");
  $login = mysqli_query($conexao, 
  "select * from tab_usuarios where email = '$usuario' and senha = md5('$senha')");
  
  if (mysqli_num_rows($login)>0){
    $_SESSION["usuario"] = mysqli_fetch_assoc($login);
    echo "1";
  }else{
    echo "Usuário ou Senha inválido!";
  }
?>