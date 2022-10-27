<?php
    session_start();
    if (isset($_SESSION["usuario"])){
        header("Location: admin.php");
        exit();
    }
?>
<html>
    <head>
        <title>Area Administrativa da Loja</title>
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    </head>
    <body>
     <center>
      <form action="" method="post">
         <table class="TabelaLogin">
            <tr>
              <td colspan="2"><h1>Area Administrativa</h1></td>
            </tr>
            <tr>
              <td>Usuário</td>
              <td><input type="text" name="txtUsuario" id="txtUsuario"></td>
            </tr>
            <tr>
              <td>Senha</td>
              <td><input type="password" name="txtSenha" id="txtSenha"></td>
            </tr>
            <tr>
              <td colspan="2" align="right"><button type="submit">Acessar</button></td>
            </tr>
            <tr>
              <td colspan="2" align="right">
                  <?php
                     include_once("../includes/conexao.php");
                     $usuarios = mysqli_query($conexao, "select * from tab_usuarios limit 1" );
                     if (mysqli_num_rows($usuarios)<1){ //Se não possuir algum usuário
                       $insereUsuario = mysqli_query($conexao, "insert into tab_usuarios VALUES 
                                            (0, 'Administrador','etec@etec.com', md5('123'))"); 
                        echo "<font color='black'>Usuário padrão: Usuário: etec@etec.com Senha: 123 </font>";
                     }
                     if (mysqli_num_rows($usuarios)==1){
                       $administrador = mysqli_fetch_assoc($usuarios);
                       if ($administrador["email"]=='etec@etec.com'){
                          echo "<font color='black'>Usuário padrão: Usuário: etec@etec.com Senha: 123 </font>";
                       }
                     }
                  ?>
              </td>
            </tr>
        </table>
     </form>
   </center>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script>
      $("button").click(function(e){
        e.preventDefault();
        $("button").prop("disabled","true");
        $("button").html('<img src="../imgs/loader.gif" width="32">Aguarde...');
        
        if ( $("#txtUsuario").val() == ''){
           alert('Preencha o Usuario');
           $("button").html('Acessar');
           $("button").removeAttr("disabled"); 
           $("#txtUsuario").focus();
           return false;
        }
        
        $.post("login.php",{usuario:$("#txtUsuario").val(), senha: $("#txtSenha").val()}, function(retorno){
        
          if (retorno==1){
            window.location.href="admin.php";
          }else{
            alert(retorno);
          }

           $("button").removeAttr("disabled"); //Reativa o botão que foi desabilitado

        } )
        
        $("button").html('Acessar');

      })
   </script>
</body>
</html>