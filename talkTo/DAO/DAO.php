<?php

class DAO {
  
    
   function inserirMensagem($texto) {     
       include("conectar.php");
          
                    $idDia = 101;
       $dataHor = date("d/m/y")." ".date("H:i:s");       
       mysql_query("INSERT INTO mensagem (id, idDialogo, texto, dataHora) VALUES (null, '$idDia', '$texto', '$dataHor')")or die(mysql_error());        
   }
   
   /*
    date("d/m/y"); 
    date("H:i");
    */
   
   function colecaoMensagens() {           
         include("conectar.php"); 

        $result = mysql_query("SELECT * FROM mensagem");
        
        while($row = mysql_fetch_array($result)){
            echo $row['id'] . " | " . $row['idDialogo']." | ".$row['texto']." | ".$row['dataHora'];
            echo "<br />";
        }
   }
   
}
