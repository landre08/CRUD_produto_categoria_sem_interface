<?php

    ini_set("default_charset", "UTF-8");
    require_once("../../include/config.php");
    require_once("../../include/crud.php");
    
    @$id = (int) $_POST['id'];
    @$acao = $_POST['acao'];    

    $txt_categoria = $_POST["txt_categoria"];
    $txt_ativo = $_POST["txt_ativo"];
    
    $dados = array(
        "categoria" => $txt_categoria,
        "ativo_categoria" => $txt_ativo
    );
    
    $op = false;
    if($acao == "Cadastrar"){
        $op = inserir("categoria", $dados);
    }else if($acao == "Alterar"){
        $op = alterar("categoria", $dados, " id_categoria = $id");
    }else if($acao == "Excluir"){
        $op = deletar("categoria", " id_categoria = $id");
    }
    
    if($op){
        header("location: ".URL_ADMIN."index.php?link=2");
    }else{
        header("location: ".URL_ADMIN."index.php?link=3");
    }
    
    
    
    
    
    
    
