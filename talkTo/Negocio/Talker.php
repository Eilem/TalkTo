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
    
    public function obterDialogoDeTalkers($talker1,$talker2){
        try{
        $oProxyDao = new ProxyDAO();
        return $oProxyDao->obterDialogoDeTalkers($talker1,$talker2);
        }catch(Exception $erro){
            echo($erro->getMessage());
        }
    }
    
}