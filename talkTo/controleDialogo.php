<?php
require_once("bootstrap.php");

    try{
        if(!empty($_POST)){
            if(!empty($_POST['usuario'])){
                $talker1 = $_POST['usuario'];
            }
        }
    }catch(Exception $erro){
        echo($erro->getMessage());
    }