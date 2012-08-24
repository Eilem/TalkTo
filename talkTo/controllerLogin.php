<?php

require_once 'bootstrap.php';
$cUsuarios = "";
    try{
        if(!empty($_POST)){
            if(!empty($_POST['user'])){
                $user = $_POST['user'];
                }           
                $oUsuario = new Usuario();
                
                if(!$oUsuario->validarUsuario($user)){
                    
                    $oUsuario->setId($user);
                    $oUsuario->setOnLine('1');
                    
                    $oUsuario->isOnLine($oUsuario);
                    $oUsuario->obterUsuario($oUsuario->getId());
                    
                    require_once("formTalker.php");
                    
                }else{
                    throw new Exception("usuario não localizado!");
                }
        }
    }catch(Exception $erro){
        echo($erro->getMessage());
    }
    
