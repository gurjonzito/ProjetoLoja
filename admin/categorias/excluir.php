<?php
    $id_categoria = $_GET["id"];
    include_once("../../includes/conexao.php");
    $apagar = mysqli_query($conexao, "delete from tab_categorias where id = '$id_categoria'");
    if ($apagar){
        echo '<script>alert("Categoria removida com sucesso")</script>';
        echo '<meta http-equiv="refresh" content="0; URL=\'../admin.php?pagina=Categorias\'"/>';
    }else{
        echo "Erro ao tentar remover";
    }
?>