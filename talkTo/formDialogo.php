<html>
    <head>
        <title>Talk To</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <script type="text/javascript">
            var xmlhttp;
            
        var interval = setInterval(function(){myFunction()},1000);
            
            function loadXMLDoc(url,cfunc){
                if (window.XMLHttpRequest){
                    xmlhttp=new XMLHttpRequest();
                }
                else{
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                    xmlhttp.onreadystatechange=cfunc;
                    xmlhttp.open("GET",url,true);
                    xmlhttp.send();
               }
            
            function myFunction(){
                
                var usuario1 = document.getElementById('usuario1').value;
                var usuario2 = document.getElementById('usuario2').value;
                
                loadXMLDoc("controller.php?usuario1="+usuario1+"&usuario2="+usuario2,function(){
                    if (xmlhttp.readyState==4 && xmlhttp.status==200){
                        document.getElementById("textarea").innerHTML=xmlhttp.responseText;
                    }
                });
            }
           
        </script>
    </head>
    <body>
        <form method="POST" action="controller.php" class="formDialogo" id="teste"/>
            <h3>Você esta no Talker To!<h3/>
            <br/>
            <div>
                <input type="hidden" name="idDialogo" value="<?php if(isset($id)) echo($id);?>"/>
            </div>
            <div>
                User 1<input type="text" name="idTalker1" value="<?php if(isset($idTalker1)) echo($idTalker1->getUsername());?>"/>
                User 2<input type="text" name="idTalker2" value="<?php if(isset($idTalker2)) echo($idTalker2->getUsername());?>"/>
            </div>            
            <div>
                <textarea name="mensagens" id="textarea"readonly>
                  <?php
                  if(isset($dialogo)){
                      echo $dialogo;
                  }
                  ?>
                </textarea>
            </div>
            <br/>
            <div>
                <input type="text" name="mensagem" id="texto" />
            </div>
            <br/>
            <input type="submit" value="Enviar Mensagem" name="enviar" title="Clique aqui para enviar sua mensagem!"/>  
            <input type="hidden" value="<?php echo $idTalker1->getId() ?>" name="usuario1" id="usuario1"/>
            <input type="hidden" value="<?php echo $idTalker2->getId() ?>" name="usuario2" id="usuario2"/>
            <input type="hidden" value="flag" name="acao"/>
            <input type="submit" value="Encerrar Diálogo" name="encerrarDialogo" title="Clique aqui para Encerrar este Di&aacute;logo!!"/>
            <input type="submit" value="Sair" name="sair" onclick="clearInterval(interval)" title="Clique aqui para Sair do Di&aacute;logo"/>

        </form>
    </body>
</html>