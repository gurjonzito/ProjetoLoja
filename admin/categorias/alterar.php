<?php
    $id = $_GET["id"];
    include("../includes/conexao.php");
    $categoriaSelecionada = mysqli_query($conexao,"select * from tab_categorias where id = '$id' ");
    $categoria = mysqli_fetch_assoc($categoriaSelecionada);
    ?>
<center>
    <h1>Alteração de Categorias</h1>
        <form method="post" action="categorias/salvarAlteracao.php">
            <table border= "0">
                <tr>
                    <td>Informe a Categoria</td>
                    <td><input type="text" name="categoria" value="<?php echo $categoria["descricao"] ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <input name="id" type="hidden" value="<?php echo $categoria["id"] ?>">
                        <input type="submit" value="Gravar">
                    </td>
                </tr>
        </table>
    </form>
    <?php
    include_once("../includes/conexao.php");
    $listar = mysqli_query($conexao, "select * from tab_categorias order by id");

    if (mysqli_num_rows($listar)==0){
        echo "Nenhuma Categoria Cadastrada";
    }else{
        echo '<table border="1">';
        echo '<tr><td>Categoria</td><td>Ações</td></tr>';
        while ($linha = mysqli_fetch_assoc($listar)){
            echo '<tr>';
            echo '<td>'.$linha["descricao"].'</td>';
            echo '<td><a href="categorias/excluir.php?id='.$linha["id"].'">Excluir</a> | ';
            echo '<a href="?pagina=AlterarCategoria&id='.$linha["id"].'">Alterar</a>';
            echo '</tr>';
        }
        echo '</table>';
    }
    ?>
</center>