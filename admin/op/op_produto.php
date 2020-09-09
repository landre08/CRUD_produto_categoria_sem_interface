<?php

    ini_set("default_charset", "UTF-8");
    require_once("../../include/config.php");
    require_once("../../include/crud.php");
    
    @$id = (int) $_POST['id'];
    @$acao = $_POST['acao'];    

    $txt_id_categoria = $_POST["txt_id_categoria"];
    $txt_produto = $_POST["txt_produto"];
    $txt_ativo = $_POST["txt_ativo"];
    
    $dados = array(
        "id_categoria" => trim($_POST["txt_id_categoria"]),
        "id_subcategoria" => trim($_POST["txt_id_subcategoria"]),
        "id_fabricante" => trim($_POST["txt_id_fabricante"]),
        "ativo_produto" => trim($_POST["txt_ativo"]),
        "produto" => trim($_POST["txt_produto"]),
        "imagem" => trim($_POST["text_imagem"]),
        "preco_alto" => trim($_POST["txt_preco_alto"]),
        "preco" => trim($_POST["txt_preco"]),
        "descricao" => trim($_POST["txt_descricao"]),
        "detalhes" => trim($_POST["txt_detalhes"]),
        "destaque" => trim($_POST["txt_destaque"])
    );
    
    $op = false;
    if($acao == "Cadastrar"){
        $op = inserir("produto", $dados);
    }else if($acao == "Alterar"){
        $op = alterar("produto", $dados, " id_produto = $id");
    }else if($acao == "Excluir"){
        $op = deletar("produto", " id_produto = $id");
    }
    
    if($op){
        header("location: ".URL_ADMIN."index.php?link=8");
    }else{
        header("location: ".URL_ADMIN."index.php?link=9");
    }
    
    
    
    
    
    
    
