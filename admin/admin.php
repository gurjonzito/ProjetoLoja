<?php
    session_start();
    if (!isset($_SESSION["usuario"])){
        header("Location: index.php");
        exit();
    }
?>
<html>
    <head>
        <title>Area Administrativa</title>
        <link rel="stylesheet" type="text/css" href="../css/estiloadmin.css">
    </head>
    <body>
        <div class="menu">
            <ul class="list-itens">
            <a href="admin.php">Inicio</a>
            <a href="?pagina=Categorias">Categorias</a>
            <a href="?pagina=SubCategorias">SubCategorias</a>
            <a href="?pagina=Produtos">Produtos</a>
            <a href="?pagina=Pedidos">Pedidos</a>
            <a href="sair.php">Sair</a>
        </div>
        <div id="conteudo">
            <?php
                if (isset($_GET["pagina"])){
                    switch($_GET["pagina"]){
                        case 'Categorias' : $incluir = "categorias/index.php"; break;
                        case 'SubCategorias' : $incluir = "subcategorias/index.php"; break;
                        case 'Produtos' : $incluir = "produtos/index.php"; break;
                        case 'Pedidos' : $incluir = "pedidos/index.php"; break;
                        case 'AlterarCategoria' : $incluir = "categorias/alterar.php"; break;
                    }
                    include($incluir);
                }else{
                    echo '<h1>Escolha um item no Menu acima</h1>';
                }
            ?>
        </div>
    </body>
</html>