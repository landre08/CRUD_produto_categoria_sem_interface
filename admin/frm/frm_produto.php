<?php
@$id = (int) $_GET['id'];
@$acao = $_GET['acao'];

if ($id) {
    $produto = consultar("produto", " id_produto = $id");

    $id_categoria = $produto[0]['id_categoria'];
    $id_subcategoria = $produto[0]['id_subcategoria'];
    $id_fabricante = $produto[0]['id_fabricante'];
    $txt_produto = $produto[0]['produto'];
    $txt_preco_alto = $produto[0]['preco_alto'];
    $txt_preco = $produto[0]['preco'];
    $txt_descricao = $produto[0]['descricao'];
    $txt_detalhes = $produto[0]['detalhes'];
    $txt_imagem = $produto[0]['imagem'];
    $txt_destaque = $produto[0]['destaque'];
    $txt_ativo = $produto[0]['ativo_produto'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Cadastro de Produto</h2>
        <form action="op/op_produto.php" method="post">
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
            
            Subcategoria<br />
            <select name="txt_id_subcategoria">
                <option>Selecione uma subcategoria </option>
                <?php
                $subcategorias = consultar("subcategoria");
                foreach ($subcategorias as $subcategoria) {
                    $cod_subcategoria = $subcategoria['id_subcategoria'];

                    if ($cod_subcategoria == @$id_subcategoria) {
                        $selecionado = "selected";
                    } else {
                        $selecionado = "";
                    }
                    echo "<option  $selecionado value=$cod_subcategoria>$subcategoria[subcategoria]</option>";
                }
                ?>
            </select><br />     
            
            Fabricante<br />
            <select name="txt_id_fabricante">
                <option>Selecione uma subcategoria </option>
                <?php
                $fabricantes = consultar("fabricante");
                foreach ($fabricantes as $fabricante) {
                    $cod_fabricante = $fabricante['id_fabricante'];

                    if ($cod_fabricante == @$id_fabricante) {
                        $selecionado = "selected";
                    } else {
                        $selecionado = "";
                    }
                    echo "<option  $selecionado value=$cod_fabricante>$fabricante[fabricante]</option>";
                }
                ?>
            </select><br />    
            
            Produto <br /><input type="text" name="txt_produto" value="<?= @$txt_produto ?>" /><br />
            Imagem <br /><input type="text" name="text_imagem" value="<?= @$txt_imagem ?>" /><br />
            Preço Alto <br /><input type="text" name="txt_preco_alto" value="<?= @$txt_preco_alto ?>" /><br />
            Preço <br /><input type="text" name="txt_preco" value="<?= @$txt_preco ?>" /><br />
            Descrição <br /><textarea name="txt_descricao" rows="5" cols="40"><?php echo @$txt_descricao ?></textarea><br />
            Detalhes <br /><textarea name="txt_detalhes" rows="5" cols="40"><?php echo @$txt_detalhes ?></textarea><br />
            Ativo<br />
            <select name="txt_ativo">
                <option value="S" <?php if(@txt_ativo == "S") echo "selected" ?>>Sim</option>
                <option value="N" <?php if(@txt_ativo == "N") echo "selected" ?>>Não</option>
            </select>
            <input type="hidden" name="acao" value="<?= ($acao != '') ? $acao : 'Cadastrar' ?>" /><br /><br />
            <input type="hidden" name="id" value="<?= $id ?>" />
            <input type="submit" value="<?= ($acao != '') ? $acao : 'Cadastrar' ?>" />
        </form>
    </body>
</html>
