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


    $texto[]="um";
    $texto[]="dois";
    $texto[]="tres";
    $texto[]="quatro";
    $texto[]="cinco";
    $texto[]="seis";
    $texto[]="sete";
    $texto[]="oito";
    $texto[]="nove";

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

   foreach ($colecao as $key => $valor) {
        echo $key." | ".$valor."<br/>";
    }