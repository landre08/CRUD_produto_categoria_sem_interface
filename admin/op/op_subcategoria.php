<?php

    ini_set("default_charset", "UTF-8");
    require_once("../../include/config.php");
    require_once("../../include/crud.php");
    
    @$id = (int) $_POST['id'];
    @$acao = $_POST['acao'];    

    $txt_id_categoria = $_POST["txt_id_categoria"];
    $txt_subcategoria = $_POST["txt_subcategoria"];
    $txt_ativo = $_POST["txt_ativo"];
    
    $dados = array(
        "id_categoria" => $txt_id_categoria,
        "subcategoria" => $txt_subcategoria,
        "ativo_subcategoria" => $txt_ativo
    );
    
    $op = false;
    if($acao == "Cadastrar"){
        $op = inserir("subcategoria", $dados);
    }else if($acao == "Alterar"){
        $op = alterar("subcategoria", $dados, " id_subcategoria = $id");
    }else if($acao == "Excluir"){
        $op = deletar("subcategoria", " id_subcategoria = $id");
    }
    
    if($op){
        header("location: ".URL_ADMIN."index.php?link=4");
    }else{
        header("location: ".URL_ADMIN."index.php?link=5");
    }
    
    
    
    
    
    
    
