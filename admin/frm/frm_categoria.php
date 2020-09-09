<?php

    @$id = (int) $_GET['id'];
    @$acao = $_GET['acao'];
    
    if($id){
        $categoria = consultar("categoria", " id_categoria = $id");
        
        $txt_categoria = $categoria[0]['categoria'];
        $txt_ativo = $categoria[0]['ativo_categoria'];
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Cadastro de Categoria</h2>
        <form action="op/op_categoria.php" method="post">
            Categoria <br /><input type="text" name="txt_categoria" value="<?= @$txt_categoria ?>" /><br />
            Ativo <br /><input type="text" name="txt_ativo" value="<?= @$txt_ativo ?>" /><br />
            <input type="hidden" name="acao" value="<?= ($acao != '')? $acao: 'Cadastrar' ?>" />
            <input type="hidden" name="id" value="<?= $id ?>" />
            <input type="submit" value="<?= ($acao != '')? $acao: 'Cadastrar' ?>" />
        </form>
    </body>
</html>
