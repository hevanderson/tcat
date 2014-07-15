<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link rel="stylesheet" type="text/css" href="estilos.css" media="screen" />
        <title>taskBoard</title>
    </head>
    <body>
        <div>
            <div id="contTopo">
                <div id="topo">
                    <div id ="contTit">
                        <div id="tit">
                            taskBoard
                            <div id="subTit">
                               taskBoard
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form name="frmlogin" method="post" action="Control/router.php">
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
                               <label> Login (email): </label> <input type="text" name="txtemail" />
                            </div>
                            <div id="areaCampo">
                               <label> Senha: </label> <input type="password" name="txtsenha" />
                            </div >
                            <div id="areaCampo">
                                <p><a href="register">Criar uma nova conta</a></p>
                            </div >
                            <div id="areaBotao">
                                <input type="hidden" name="doaction" value="login" />
                                <center><input type="submit" name="btnenviar" value="Enviar" /></center>
                            </div>
                        </div>
                    </div>
                </center>
            </form>
        </div>
    </body>
</html>


