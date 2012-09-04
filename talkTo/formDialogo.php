<html id="html">
    <head>
        <title>Talk To</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <script type="text/javascript">
            var xmlhttp;
            var interval = setInterval(atualizar,2500);
            
            function loadXMLDoc(url,cfunc,dados){
                if (window.XMLHttpRequest){
                    xmlhttp=new XMLHttpRequest();
                }
                else{
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=cfunc;
                xmlhttp.open("POST",url,true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")

                xmlhttp.send(dados);
           }
           
           function enviarMensagem(){
                var usuario1 = "usuario1="+document.getElementById('usuario1').value;
                var usuario2 = "&usuario2="+document.getElementById('usuario2').value;
                var mensagem = "&mensagem="+document.getElementById('texto').value;
                var enviar = "&enviar="+document.getElementById('enviar').value;
                var dados = usuario1+usuario2+mensagem+enviar;
                document.getElementById("texto").value=null;
                send(dados);
                
            }
            
            function atualizar(){
                scrollToBottom();
                var usuario1 = "usuario1="+document.getElementById('usuario1').value;
                var usuario2 = "&usuario2="+document.getElementById('usuario2').value;
                var dados = usuario1+usuario2;           
                send(dados);
                
            }
            
            function onClickSair(){
                
                var usuario1 = "usuario1="+document.getElementById('usuario1').value;
                var usuario2 = "&usuario2="+document.getElementById('usuario2').value;
                var sair = "&sair="+document.getElementById('sair').value;
                var dados = usuario1+usuario2+sair;
                send2(dados);
            }
            function onClickEncerrarDialogo(){
                var usuario1 = "usuario1="+document.getElementById('usuario1').value;
                var usuario2 = "&usuario2="+document.getElementById('usuario2').value;
                var encerrarDialogo = "&encerrarDialogo="+document.getElementById('encerrarDialogo').value;
                var dados = usuario1+usuario2+encerrarDialogo;
                send2(dados);
                
            }
            function onClickVoltarForm(){
                var usuario1 = "usuario1="+document.getElementById('usuario1').value;
                var usuario2 = "&usuario2="+document.getElementById('usuario2').value;
                var voltar = "&voltar="+document.getElementById('voltar').value;
                var dados = usuario1+usuario2+voltar;
                send2(dados);
                
            }
            
            function send(dados){
                loadXMLDoc("controller.php",retorno,dados); 
            }
            
            function send2(dados){
                loadXMLDoc("controller.php",retorno2,dados); 
            }
            
            function retorno(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){  
                    document.getElementById("textarea").innerHTML=xmlhttp.responseText;
                }
            }
            
            function retorno2(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById("html").innerHTML=xmlhttp.responseText;
                }
            }
            
            function scrollToBottom() {  
                var textArea = document.getElementById('textarea');  
                textArea.scrollTop = textArea.scrollHeight;  
            } 
           
        </script>
    </head>
    <body>
        <form class="formDialogo" id="teste"/>
            <h3>Voce esta no Talker To!<h3/>
            <br/>
            <div>
                <input type="hidden" name="idDialogo" value="<?php if(isset($id)) echo($id);?>"/>
            </div>
            <div>
                User 1<input type="text" name="idTalker1" value="<?php if(isset($idTalker1)) echo($idTalker1->getUsername());?>"readonly/>
                User 2<input type="text" name="idTalker2" value="<?php if(isset($idTalker2)) echo($idTalker2->getUsername());?>"readonly/>
            </div>            
            <div>
                <textarea name="mensagens" id="textarea" readonly></textarea>
            </div>
            <br/>
            <div>
                <input type="text" name="mensagem" id="texto" onchange="enviarMensagem()" />

            </div>
            <br/>
            <input type="button" value="Enviar Mensagem" name="enviar" id="enviar" onclick="enviarMensagem()"  title="Clique aqui para enviar sua mensagem!"/>  
            <input type="hidden" value="<?php echo $idTalker1->getId() ?>" name="usuario1" id="usuario1"/>
            <input type="hidden" value="<?php echo $idTalker2->getId() ?>" name="usuario2" id="usuario2"/>
            <input type="button" value="Encerrar DiÃ¡logo" id="encerrarDialogo" name="encerrarDialogo" onclick="onClickEncerrarDialogo(),clearInterval(interval)" title="Clique aqui para Encerrar este Di&aacute;logo!!"/>
            <input type="button" value="Voltar" name="voltar" id="voltar" onclick="onClickVoltarForm(),clearInterval(interval)" title="Clique aqui para Voltar"/>
            <input type="button" value="Sair" name="sair" id="sair" onclick="onClickSair(),clearInterval(interval)" title="Clique aqui para Sair do Di&aacute;logo"/>

        </form>
    </body>
</html>