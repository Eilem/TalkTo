<?php

require_once 'bootstrap.php';

    try{
        if(!empty($_POST)){
            if(!empty($_POST['user'])){
                $idTalker1 = $_POST['user'];
                $oUsuario = new Usuario();
                $check = $oUsuario->validarUsuario($idTalker1);
                
                if(!is_null($check)){
                    $oUsuario->setId($idTalker1);
                    $oUsuario->setOnLine('1');
                    $oUsuario->isOnLine($oUsuario);
                    $oUsuario->obterUsuario($oUsuario->getId());
                    require_once("formTalker.php");
                }else{
                    echo("usuario não localizado!");
                }

            }else{
                throw new Exception("Favor inserir um usuario!");
               }
        }
    }catch(Exception $erro){
        echo($erro->getMessage());
    }
    
