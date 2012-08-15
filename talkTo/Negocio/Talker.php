<?php
class Talker {
    
    function obterDialogo($id){
        try{
            $pDAOnew = new ProxyDAO();
            return $pDAOnew->obterDialogo($id);
        }catch(Exception $erro){
            print($erro->getMessage());
        }
        
    }
    
}