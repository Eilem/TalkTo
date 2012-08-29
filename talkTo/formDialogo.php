<html>
    <head>
        <title>Talk To</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <script type="text/javascript">
            function loadXMLDoc(){
                var xmlhttp;
                if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp=new XMLHttpRequest();
                    }
                else{// code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function(){
                    if (xmlhttp.readyState==4 && xmlhttp.status==200){
                        document.getElementById("test").innerHTML=xmlhttp.responseText;
                    }
                }
                
                xmlhttp.open("POST","controller.php",true);
                xmlhttp.send();
            }
        </script>
    </head>
    <body>
        <form method="POST" action="controller.php" class="formDialogo" id="test"> <!--atribuindo o id test para o form -->
            <h3>Voc&Ecirc; est&aacute; no Talker To!<h3/>
            <br/>
            <div>
                <input type="hidden" name="idDialogo" value="<?php if(isset($id)) echo($id);?>"/>
            </div>
            <div>
                User 1<input type="text" name="idTalker1" value="<?php if(isset($idTalker1)) echo($idTalker1->getUsername());?>"/>
                User 2<input type="text" name="idTalker2" value="<?php if(isset($idTalker2)) echo($idTalker2->getUsername());?>"/>
            </div>
            <div>
                <textarea name="mensagens" readonly>
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
            <div>
                <input type="submit" value="Enviar Mensagem" name="enviar" title="Clique aqui para enviar sua mensagem!" onclick="loadXMLDoc()"/> <!-- aplicando a função loadXMLDoc() no Botão enviar msg-->
            </div>
            <input type="hidden" value="<?php echo $idTalker1->getId() ?>" name="usuario1"/>
            <input type="hidden" value="<?php echo $idTalker2->getId() ?>" name="usuario2"/>
            <input type="hidden" value="flag" name="acao"/>
            <input type="submit" value="Atualizar" name="atualizar" title="Clique aqui para atualizar a conversa!"/>
            <input type="submit" value="Encerrar Diálogo" name="encerrarDialogo" title="Clique aqui para Encerrar este Di&aacute;logo!!"/>
            <input type="submit" value="Sair" name="sair" title="Clique aqui para Sair do Di&aacute;logo"/>
        </form>
    </body>
</html>