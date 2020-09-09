<?php
@$id = (int) $_GET['id'];
@$acao = $_GET['acao'];

if ($id) {
    $subcategoria = consultar("subcategoria", " id_subcategoria = $id");

    $id_categoria = $subcategoria[0]['id_categoria'];
    $txt_subcategoria = $subcategoria[0]['subcategoria'];
    $txt_ativo = $subcategoria[0]['ativo_subcategoria'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Cadastro de Subcategoria</h2>
        <form action="op/op_subcategoria.php" method="post">
            Categoria<br />
            <select name="txt_id_categoria">
                <option>Selecione uma categoria </option>
<?php
$categorias = consultar("categoria");
foreach ($categorias as $categoria) {
    $cod_categoria = $categoria['id_categoria'];

    if ($cod_categoria == @$id_categoria) {
        $selecionado = "selected";
    } else {
        $selecionado = "";
    }
    echo "<option  $selecionado value=$cod_categoria>$categoria[categoria]</option>";
}
?>
            </select><br />
            Subcategoria <br /><input type="text" name="txt_subcategoria" value="<?= @$txt_subcategoria ?>" /><br />
            Ativo <br /><input type="text" name="txt_ativo" value="<?= @$txt_ativo ?>" /><br />
            <input type="hidden" name="acao" value="<?= ($acao != '') ? $acao : 'Cadastrar' ?>" />
            <input type="hidden" name="id" value="<?= $id ?>" />
            <input type="submit" value="<?= ($acao != '') ? $acao : 'Cadastrar' ?>" />
        </form>
    </body>
</html>
