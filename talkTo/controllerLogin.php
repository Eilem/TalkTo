<?php

require_once 'bootstrap.php';

    try{
        if(!empty($_POST)){
            $user = $_POST['user'];
            $password = $_POST['password'];
            
            $oUsuario = new Usuario();
            $oUsuario->setUser($user);
            $oUsuario->setPassword($password);
            $oUsuario->setLogado($logado); // = true ver como fazer e 1

        }else{
         echo "usuario não localizado!";   
        }

    }catch(Exception $erro){
        echo($erro->getMessage());
    }