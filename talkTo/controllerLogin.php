<?php
require_once 'bootstrap.php';

    try{
        if(!empty($_POST)){
            if(!empty($_POST['user'])){
                $idTalker1 = $_POST['user'];
                $oUsuario1 = new Usuario();
                $check = $oUsuario1->validarUsuario($idTalker1);
                
                if(!is_null($check)){
                    $oUsuario1->setId($idTalker1);
                    $oUsuario1->setOnLine('1');
                    $oUsuario1->isOnLine($oUsuario1);
                    $oUsuario1->obterUsuario($oUsuario1->getId());
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
    
