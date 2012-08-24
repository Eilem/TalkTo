<?php
require_once("bootstrap.php");

listarUsuariosStatus();

function listarUsuariosStatus(){
    $oUsuario = new Usuario();
    $oUsuario->setId(1);
    $oUsuario->setOnLine(1);

    $oUsuario->isOnLine();

    $oTalker = new Talker();
 
    $cUsuarios = $oTalker->cUsuarios();

    foreach($cUsuarios as $oUsuarios){
        if($oUsuario->getId()!=$oUsuarios->getId()){
        echo("User: ".$oUsuarios->getUsername()."<br/> OnLine: ".validacaoStatus($oUsuarios->getOnLine())."<br/>");
        validacaoDialogo($oUsuario->getId(),$oUsuarios->getId());
        }
    }
}


function validacaoDialogo($idTalker1,$idTalker2) {
    if($idTalker1!=$idTalker2){
        $idUsuarioUltimo = verificarTalkerUltimaMensagem($idTalker1,$idTalker2);
        echo verificarStatusUsuario($idUsuarioUltimo,$idTalker1,$idTalker2);
        echo "<p/>";
    }
    else{
        echo "fail";
        echo "<p/>";
    }
}

function obterUsuario($idTalker1) {
    $oUsuario = new Usuario();
    $oUsuario->setId($idTalker1);
    $usuarios = $oUsuario->obterUsuario();
    return ("Id: ".$usuarios->getId()."<br/> Name:".$usuarios->getUsername()."<br/> Status: ".validacaoStatus($usuarios->getOnLine())."<br/>");
}

function verificarTalkerUltimaMensagem($idTalker1,$idTalker2){
    $oTalker = new Talker();
    $idUsuarioUltimo="";
    $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);
    if($id!=null){
        $oDialogo = $oTalker->obterDialogo($id);

            foreach($oDialogo->getCMensagens() as $oMensagem){
                $idUsuarioUltimo = $oMensagem->getIdUsuario();
            }
        return $idUsuarioUltimo;
    }
    return 0;
}

function verificarStatusUsuario($idUsuarioUltimo,$idTalker1){
    if($idUsuarioUltimo==$idTalker1 ){
        return "Aguardando resposta";
    }else{
        return "Deve resposta";
    }
}

function validacaoStatus($status) {
    if($status==1){
        return "onLine";
    }else{
        return "offLine";
    }
}

