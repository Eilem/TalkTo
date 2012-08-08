<?php

require_once(dirname(__FILE__) . '/DAO/DAO.php');
require_once(dirname(__FILE__) . '/DAO/ProxyDAO.php');
require_once(dirname(__FILE__) . '/Negocio/Dialogo.php');
require_once(dirname(__FILE__) . '/Negocio/Mensagem.php');

$dialogo = new Dialogo();
$mensagem = new Mensagem();

$dialogo->setId(null);
$dialogo->setHoraData(date("d/m/y")." ".date("H:i:s"));

$dialogo->criarDialogo($dialogo);


    $texto[]="1";
    $texto[]="2";
    $texto[]="3";
    $texto[]="4";
    $texto[]="5";
    $texto[]="6";
    $texto[]="7";
    $texto[]="8";
    $texto[]="9";

$i=0;    
while($i<=8){
    $mensagem->setId(null);
    $mensagem->setIdDialogo($dialogo->getId());
    $mensagem->setTexto($texto[$i]);
    $mensagem->setDataHora(date("d/m/y")." ".date("H:i:s"));
    
    $dialogo->inserirMensagem($mensagem);
    $i++;
}
   $colecao = $dialogo->colecaoMensagens($mensagem->getIdDialogo());
    
   
   
   for($i=0;$i<count($colecao);$i++){
       echo $colecao[$i]."<br/>";
   }
//    foreach ($colecao as $item){
//        echo $item['texto']."<br/>";
//    }