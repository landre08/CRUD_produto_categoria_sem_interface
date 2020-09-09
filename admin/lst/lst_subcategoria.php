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
    <h2>Subcategoria</h2>
    
    <form action="index.php" method="get" name="buscausuario" id="buscausuario">
        <table border="0">
            <tbody>
                <tr>
                    <th width="16%"><strong>Buscar:</strong></th>
                    <th width="60%"><input type="text" name="pesq" value="<?php echo @$pesq ?>" /></th>
                    <th>
                        <select name="campo">
                            <option value="subcategoria">subcategoria</option>
                            <option value="ativo_subcategoria">Ativo (S ou N)</option>
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
    
    <p><a href="index.php?link=5">Cadastrar<a></p>

<?php
    if(@$pesq != ""){
        $sql1 = "SELECT id_categoria FROM subcategoria WHERE $campo LIKE '%$pesq%'";
        $sql2 = "SELECT * FROM categoria a, subcategoria s WHERE a.id_categoria = s.id_categoria AND $campo LIKE '%$pesq%'";
        $complemento = "&pesq=$pesq&campo=$campo";
    }else{
        $sql1 = "SELECT id_categoria FROM subcategoria";
        $sql2 = "SELECT * FROM categoria a, subcategoria s WHERE a.id_categoria = s.id_categoria";        
        $complemento = "";
    }
    $total = total($sql1);
if ($total <= 0) {
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

    $subcategorias = selecionar($sql2 . " LIMIT $inicio, $lpp");
    foreach ($subcategorias as $subcategoria) {
        ?>
        <tr>
            <td><?= $subcategoria['id_subcategoria'] ?></td>
            <td><?= $subcategoria['subcategoria'] ?></td>
            <td><?= $subcategoria['subcategoria'] ?></td>
            <td><?= $subcategoria['ativo_subcategoria'] ?></td>
            <td><a href="index.php?link=5&acao=Alterar&id=<?= $subcategoria['id_subcategoria'] ?>">Editar</a></td>
            <td><a href="index.php?link=5&acao=Excluir&id=<?= $subcategoria['id_subcategoria'] ?>">Excluir</a></td>
        </tr> 
    <?php }
} ?>
</table>
<p><?php echo mostraPaginacao("index.php?link=4$complemento", $ordem, $lpp, $total) ?></p>
</body>
</html>