<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="estilos.css" media="screen" />
        <title>FAN</title>
    </head>
    <body>
        <div>
            <div id="contTopo">
                <div id="topo">
                    <div id ="contTit">
                        <div id="tit">
                            FAN
                            <div id="subTit">
                                FAN
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form name="frmlogin" method="post" action="router.php">
                <center>
                    <div id="caixaLogin">
                        <div id="tit">
                            Acesso ao Sistema
                        </div>
                        <div>
                            <div id="areaErro">
                                <?php                                  
                                   echo (isset($_GET["error"])) ? $_GET["error"] : '';                                    
                                ?>
                            </div>
                            <div id="areaCampo">
                               <label> Nome </label> <input type="text" name="txtnome" />
                            </div>
                            <div id="areaCampo">
                               <label> Email </label> <input type="text" name="txtemail" />
                            </div>
                            <div id="areaCampo">
                               <label> Sobrenome </label> <input type="text" name="txtsnome" />
                            </div>
                            <div id="areaCampo">
                               <label> Data Nascimento </label> <input type="text" name="txtdatanasc" />
                            </div>
                            <div id="areaCampo">
                               <label> Username </label> <input type="text" name="txtusername" />
                            </div>
                            <div id="areaCampo">
                               <label> Senha: </label> <input type="password" name="txtsenha" />
                            </div >
                            <div id="areaCampo">
                               <label> Confirmar Senha: </label> <input type="password" name="txtconfsenha" />
                            </div >
                            <div id="areaBotao">
                                <input type="hidden" name="doaction" value="adduser" />
                                <center><input type="submit" name="btnenviar" value="Enviar" /></center>
                            </div>
                        </div>
                    </div>
                </center>
            </form>
        </div>
    </body>
</html>
