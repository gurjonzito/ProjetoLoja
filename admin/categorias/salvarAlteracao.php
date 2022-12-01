<?php
    $id_categoria = $_POST["id"];
    $descricao = $_POST["categoria"];
    include_once("../../includes/conexao.php");
    $atualizar = mysqli_query($conexao, "update tab_categorias set descricao = '$descricao' where id = '$id_categoria'");
    if ($atualizar){
        echo '<script>alert("Categoria atualizada com sucesso")</script>';
        echo '<meta http-equiv="refresh" content="0; URL=\'../admin.php?pagina=Categorias\'"/>';
    }else{
        echo "Erro ao tentar alterar";
    }
?>
