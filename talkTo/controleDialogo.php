<?php
require_once("bootstrap.php");
 $cUsuarios = "";

    try{
        if(!empty($_POST)){
            if(!empty($_POST['usuario'])){
                $idTalker1 = $_POST['usuario'];
            }
            $oTalker = new Talker();
            if($oTalker->validarUsuario($idTalker1)){
                $cUsuarios = $oTalker->cUsuarios();
                 require_once("talker.php");
                 
                    
                    if(!empty($_POST['idTalker2'])){
                        $idTalker2= $_POST['idTalker2'];
                    } 

                    if(!empty($_POST['atualizar'])){
                        atualizar($idTalker1, $idTalker2);
                    }
                    if(!empty($_POST['enviar'])){
                        enviar($idTalker1, $idTalker2);
                    }

                    if(!empty($_POST['fecharDialogo'])){
                        encerrarDialogo($idTalker1, $idTalker2);
                    } 
                    

                    
            }
            else{
                echo "Talker não localizado!! Favor inseir um id válido!";
            }
            
            
        }
    }catch(Exception $erro){
        echo($erro->getMessage());
    }
    
    function encerrarDialogo($idTalker1,$idTalker2){
        $oTalker = new Talker();
        try{
          if(validacaoUsuario($idTalker1,$idTalker2)){
            $oTalker->encerrarDialogo($idTalker1,$idTalker2);
            require_once("index.html");
          }  
        }catch(Exception $erro){
            echo($erro->getMessage());
            
        }
    }
    
    function atualizar($idTalker1,$idTalker2){
        
        $oTalker = new Talker();
        $dialogo="";
        try{
                       
            if(validacaoUsuario($idTalker1,$idTalker2)){
                $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);
                if($id!=null){
                    $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);//pq repete a função? o $id já possui o id do dialogo^
                    $oDialogo = $oTalker->obterDialogo($id); // não é preciso instanciar o objeto $oDialogo??

                    foreach($oDialogo->getCMensagens() as $oMensagem){
                            $dialogo.= date('d-m H:i',$oMensagem->getDataHora())." - ".$oMensagem->getTexto()."\n";
                    }
                }
            }
            require_once("formDialogo.php");
    
        }catch(Exception $erro){
            echo($erro->getMessage());
        }
    }
    
    function enviar($idTalker1, $idTalker2){
        $dialogo="";
        try{
            if(validacaoUsuario($idTalker1,$idTalker2)){
                if(!empty($_POST['mensagem'])){
                    $mensagem = $_POST['mensagem'];
                    $oTalker = new Talker();
                    
                    $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);
                    if($id!=null){
                        $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);
                        $oDialogo = $oTalker->obterDialogo($id);
                        
                        foreach($oDialogo->getCMensagens() as $oMensagem){
                            $dialogo.= date('d-m H:i',$oMensagem->getDataHora())." - ".$oMensagem->getTexto()."\n";
                            }
                    }else{
                        $oDialogo = new Dialogo(); // criando Dialogo
                        $oDialogo->setId(null);
                        $oDialogo->setHoraData(time());
                        $oDialogo->setTalker1($idTalker1);
                        $oDialogo->setTalker2($idTalker2);
                        $oDialogo->setStatus(true);
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
                            $dialogo .= date('d-m H:i',$oMensagem->getDataHora())." - ".$oMensagem->getTexto()."\n";
                            }
                        require_once("formDialogo.php");    
                       
                }
             }
             }catch(Exception $erro){
                        echo($erro->getMessage());
        }
    }
            
    function validacaoUsuario($idTalker1,$idTalker2){
                 $oTalker = new Talker();
                 $validacao1 = $oTalker->validarUsuario($idTalker1);
                 $validacao2 = $oTalker->validarUsuario($idTalker2);
                 
                 if(($validacao1)&&($validacao2)){
                     return true;
                 }
                 else{
                     throw new Exception ("Talker não localizado!! Favor inseir um id válido!");
                     return false;
                 }
                    
    }
    