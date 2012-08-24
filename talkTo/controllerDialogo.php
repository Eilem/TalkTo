<?php
require_once("bootstrap.php");

    $cUsuarios = "";
    
    try{
        if(!empty($_POST)){
            if(!empty($_POST['usuario'])){
                $talker1 = $_POST['usuario'];
            }
            $oTalker= new Talker();
            if($oTalker->validarUsuario($talker1)){
                $cUsuarios = $oTalker->cUsuarios();
                require_once("formtalker.php");
            }
        }
    }catch(Exception $erro){
        echo($erro->getMessage());
    }