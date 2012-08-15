<?php
require_once("bootstrap.php");

    try{
        if(!empty($_POST)){
            if(!empty($_POST['mensagem'])){
                $mensagem = $_POST['mensagem']; 
                
                if(!empty($_POST['idDialogo'])){
                    
                     $oTalker = new Talker();
                     $oDialogo = $oTalker->obterDialogo($_POST['idDialogo']);
                   
                }else{
                    $oDialogo = new Dialogo(); // criando Dialogo
                    $oDialogo->setId(null);
                    $oDialogo->setHoraData(time());
                }
                
                $oMensagem= new Mensagem(); //criando msg
                $oMensagem->setId(null);
                $oMensagem->setIdDialogo($oDialogo->getId());
                $oMensagem->setTexto($mensagem);
                $oMensagem->setDataHora(time());
                $oDialogo->setCMensagens($oMensagem);
                
                
                $oDialogo->persistir();
                
                $id = $oDialogo->getId();

                $oMensagem->__destruct();

                $cMensagens = $oDialogo->getCMensagens();
               
                $dialogo="";
                foreach($cMensagens as $oMensagem){
                         $dialogo.=$oMensagem->getTexto();
                    }
                    
            require_once("formdialogo.php");
            }else{
                throw new Exception("Digite uma mensagem para enviar!");
            }
        }
    }catch(Exception $erro){
        echo($erro->getMessage());
    }
