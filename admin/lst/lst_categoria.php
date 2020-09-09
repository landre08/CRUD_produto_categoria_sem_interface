<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>     
        <p><a href="index.php?link=3">Cadastrar<a></p>
        <table border="1">
            <tr>
                <td>Id</td>
                <td>Categoria</td>
                <td>Ativo</td>
                <td colspan="2">Ação</td>
            </tr>
            
            <?php 
                $categorias = consultar("categoria");
                if($categorias) {
                   foreach($categorias as $categoria) {                               
            ?>
                    <tr>
                        <td><?= $categoria['id_categoria'] ?></td>
                        <td><?= $categoria['categoria'] ?></td>
                        <td><?= $categoria['ativo_categoria'] ?></td>
                        <td><a href="index.php?link=3&acao=Alterar&id=<?= $categoria['id_categoria'] ?>">Editar</a></td>
                        <td><a href="index.php?link=3&acao=Excluir&id=<?= $categoria['id_categoria'] ?>">Excluir</a></td>
                    </tr> 
            <?php }             
                } else {
                echo "Não existem dados cadastrados.";
            }?>
        </table>
    </body>
</html>