<?php
class Talker {
    
    public function obterDialogo($id){
        try{
            $pDAOnew = new ProxyDAO();
            return $pDAOnew->obterDialogo($id);
        }catch(Exception $erro){
            echo($erro->getMessage());
        }
    }
    
    public function obterDialogosDeTalkers($talker1,$talker2){
        try{
        $oProxyDao = new ProxyDAO();
        return $oProxyDao->obterDialogosDeTalkers($talker1,$talker2);
        }catch(Exception $erro){
            echo($erro->getMessage());
        }
    }
    
    public function atualizarDialogo($talker1, $talker2){
        try{
            $oProxyDao = new ProxyDAO();
            return $oProxyDao->atualizarDialogo($talker1, $talker2);
        }catch(Exception $erro){
            echo($erro->getMessage());
        }
    }

    public function encerrarDialogo($talker1,$talker2){
        try{
            $oProxyDao = new ProxyDAO();
            return $oProxyDao->encerrarDialogo($talker1, $talker2);

        }catch(Exception $erro){
            echo($erro->getMessage());
        }
    }
}