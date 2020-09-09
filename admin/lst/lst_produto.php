<?php
@$ordem = isset($_GET['ordem']) ? $_GET['ordem'] : 0;
@$pesq = isset($_GET['pesq']) ? $_GET['pesq'] : "";
@$campo = isset($_GET['campo']) ? $_GET['campo'] : "";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>     
    <h2>Produto</h2>
    
    <form action="index.php" method="get" name="buscausuario" id="buscausuario">
        <table border="0">
            <tbody>
                <tr>
                    <th width="16%"><strong>Buscar:</strong></th>
                    <th width="60%"><input type="text" name="pesq" value="<?php echo @$pesq ?>" /></th>
                    <th>
                        <select name="campo">
                            <option value="produto">produto</option>
                            <option value="ativo_produto">Ativo (S ou N)</option>
                        </select>
                    </th>                    
                        <input type="hidden" name="link" value="4" /> 
                   <th>
                       <input type="submit" name="Submit" value="" class="but" />
                   </th>
                </tr>
            </tbody>
        </table>
    </form>
    
    <p><a href="index.php?link=9">Cadastrar<a></p>

<?php
    if(@$pesq != ""){
        $sql1 = "SELECT id_categoria FROM produto WHERE $campo LIKE '%$pesq%'";
        $sql2 = "SELECT * FROM categoria a, produto s WHERE a.id_categoria = s.id_categoria AND $campo LIKE '%$pesq%'";
        $complemento = "&pesq=$pesq&campo=$campo";
    }else{
        $sql1 = "SELECT id_categoria FROM produto";
        $sql2 = "SELECT * FROM categoria a, produto s WHERE a.id_categoria = s.id_categoria";        
        $complemento = "";
    }
    $total = total($sql1);
if ($total <= 0) {
    $lpp = 1;
    echo "Não existem dados cadastrados";
} else {
    ?>

<table border="1">
    <tr>
        <td>Id</td>
        <td>Subcategoria</td>
        <td>Categoria</td>
        <td>Ativo</td>
        <td colspan="2">Ação</td>
    </tr>

    <?php
    $lpp = 10; // Linhas por páginas
    $inicio = $ordem * $lpp;

    $produtos = selecionar($sql2 . " LIMIT $inicio, $lpp");
    foreach ($produtos as $produto) {
        ?>
        <tr>
            <td><?= $produto['id_produto'] ?></td>
            <td><?= $produto['produto'] ?></td>
            <td><?= $produto['produto'] ?></td>
            <td><?= $produto['ativo_produto'] ?></td>
            <td><a href="index.php?link=9&acao=Alterar&id=<?= $produto['id_produto'] ?>">Editar</a></td>
            <td><a href="index.php?link=9&acao=Excluir&id=<?= $produto['id_produto'] ?>">Excluir</a></td>
        </tr> 
    <?php }
} ?>
</table>
<p><?php echo mostraPaginacao("index.php?link=8$complemento", $ordem, $lpp, $total) ?></p>
</body>
</html>