<center>
    <h1>Cadastro de Categorias</h1>
        <form method="post" action="categorias/salvar.php">
            <table border= "0">
                <tr>
                    <td>Informe a Categoria</td>
                    <td><input type="text" name="categoria"></td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
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