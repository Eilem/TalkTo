<?php
require_once("bootstrap.php");

//---------------------------------------------------------
// Set o status e mostra a coleção de usuarios

//$oUsuario = new Usuario();
//$oUsuario->setId(1);
//$oUsuario->setOnLine(1);
//
//$oUsuario->isOnLine();
//
//$oTalker = new Talker();
// 
//$cUsuarios = $oTalker->cUsuarios();
//
//foreach($cUsuarios as $oUsuarios){if(idUsuarioUltimoo==$idTalker1 ){
//    echo("User: ".$oUsuarios->getUsername()."<br/> OnLine: ".$oUsuarios->getOnLine()."<p/>");
//}

//---------------------------------------------------------
$idTalker1=1;
$idTalker2=2;


$idUsuarioUltimo = verificarTalkerUltimaMensagem($idTalker1,$idTalker2);

verificarStatusUsuario($idUsuarioUltimo,$idTalker1,$idTalker2);

obterUsuario($idTalker1);



function obterUsuario($idTalker1) {
    $oUsuario = new Usuario();
    $oUsuario->setId($idTalker1);
    $usuarios = $oUsuario->obterUsuario();
    echo "<p/>";
    echo("Id: ".$usuarios->getId()."<br/> Name:".$usuarios->getUsername()."<br/> Status: ".validacaoStatus($usuarios->getOnLine())."<br/>");
}

function verificarTalkerUltimaMensagem($idTalker1,$idTalker2){
    $oTalker = new Talker();
    $idUsuarioUltimo="";
    $id = $oTalker->obterDialogosDeTalkers($idTalker1,$idTalker2);
    
    $oDialogo = $oTalker->obterDialogo($id);

        foreach($oDialogo->getCMensagens() as $oMensagem){
            $idUsuarioUltimo = $oMensagem->getIdUsuario();
        }
    return $idUsuarioUltimo;
}

function verificarStatusUsuario($idUsuarioUltimo,$idTalker1){
    if($idUsuarioUltimo==$idTalker1 ){
        echo "Usuario ".$idTalker1." aguardando resposta";
    }else{
        echo "Usuario ".$idTalker1." deve resposta";
    }

}

function validacaoStatus($status) {
    if($status==1){
        return "onLine";
    }else{
        return "offLine";
    }
}



