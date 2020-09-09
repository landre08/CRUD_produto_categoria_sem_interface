<!DOCTYPE html>
<?php
require '../include/config.php';
require '../include/crud.php';
require '../include/biblio.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1" align="center" width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <table border="1" align="center"  width="750px" cellpadding="0" cellspacing="1">
                        <tr><td colspan="2"><?php include("cabecalho.php") ?></td></tr>
                        <tr>
                            <td  width="140px"><?php include("menu.php") ?></td>
                            <td>
                                <table  width="600px" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                            <?php
                                            @$link = $_GET['link'];
                                            $pag[1] = "home.php";
                                            $pag[2] = "lst/lst_categoria.php";
                                            $pag[3] = "frm/frm_categoria.php";
                                            $pag[4] = "lst/lst_subcategoria.php";
                                            $pag[5] = "frm/frm_subcategoria.php";
                                            $pag[6] = "lst/lst_fabricante.php";
                                            $pag[7] = "frm/frm_fabricante.php";
                                            $pag[8] = "lst/lst_produto.php";
                                            $pag[9] = "frm/frm_produto.php";

                                            if (!empty($link)) {
                                                if (file_exists($pag[$link])) {
                                                    include($pag[$link]);
                                                } else {
                                                    include("home.php");
                                                }
                                            } else {
                                                include("home.php");
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td colspan="2"><?php include("rodape.php") ?></td></tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
