<?php
require_once("bootstrap.php");

try{
    if(!empty($_POST)){
        if(!empty($_POST['mensagem'])){
            $mensagem = $_POST['mensagem'];
            $oDialogo = new Dialogo(); // criando Dialogo
            
            $oMensagem= new Mensagem(); //criando msg
            $oMensagem->setTexto($mensagem);
            
            $oDialogo->setCMensagens($oMensagem);
            
            $oDialogo->persistir();
            $oMensagem->__destruct();
            
            $cMensagens = $oDialogo->colecaoMensagens();
            
            foreach ($cMensagens as $oMensagem){
                $dialogo.=$oMensagem->getTexto()."<br/>";
            }
           require_once("formdialogo.php");
        }else{
            throw new Exception("Digite uma mensagem para enviar!");
        }
    }
}catch(Exception $erro){
    echo($erro->getMensage());
}