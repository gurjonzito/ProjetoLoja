<?php
session_start(); //Inicia a sessão
session_destroy(); //Destroy todas as variaveis de sessão existente
header("location: index.php"); //Redireciona a página para a tela de login
?>