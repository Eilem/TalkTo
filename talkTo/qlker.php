<?php

require_once 'bootstrap.php';

$teste = new Talker();

//$teste->atualizarDialogo(1,2);

//var_dump($teste->atualizarDialogo(2,4));

//var_dump($teste->encerrarDialogo(1,3));

//$teste->encerrarDialogo(1,3);

var_dump($teste->validarUsuario(5));


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
            }else{
                throw new Exception("usuario naum preenchido!");
            }
        }
    }catch(Exception $erro){
        echo($erro->getMessage());
    }