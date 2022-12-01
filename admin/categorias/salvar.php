<?php
$categoria = $_POST["categoria"];
include "../../includes/conexao.php";

$inserir = mysqli_query($conexao, "insert into tab_categorias VALUES (null, '$categoria')");
if ($inserir){
    echo '<script>alert("Categoria gravada com sucesso")</script>';
    echo '<meta http-equiv="refresh" content="0; URL=\'../admin.php?pagina=Categorias\'"/>';
}else{
    echo "Ocorreu algum erro ao tentar salvar";
}
?>