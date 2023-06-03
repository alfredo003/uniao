<!DOCTYPE html>
<?php if (isset($_SESSION['senha']) and $_SESSION['senha'] > 0){header('location:./home.php');}?>
<html>
    <head>
         <title>BDgenesis</title
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

      
        <link rel="icon" href="images/uniao.JPG"/>
        <link rel="stylesheet" href="css/style.default.css" type="text/css" />
        <link rel="stylesheet" href="css/style.shinyblue.css" type="text/css" />


        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
        <script type="text/javascript" src="js/modernizr.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.cookie.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
     <script type="text/javascript">
            jQuery(document).ready(function () {
                jQuery('#login').submit(function () {
                    var u = jQuery('#nome').val();
                    var p = jQuery('#senha').val();
                    if (u === '' && p === '') {
                        jQuery('#alert').html('<div class="alert alert-info">Preecha os Campos</div>').show(200).delay(5000).hide(200);
                        return false;
                    } else {
                        jQuery.ajax({
                            type: 'POST',
                            url: 'controller/login.php',
                            data: {util:u, senha:p},
                           
                            success: function (dados) {
                                if (dados.trim() === 'sucesso') {
                                    jQuery('#alert').html('<div class="alert alert-success">Opera&ccedil;&atilde;o terminada com sucesso</div>').show(200).delay(5000).hide(200);
                                   window.location = 'home.php';
                                  return false;
                                }  
                                else if (dados.trim() === 'erro') {
                                    jQuery('#alert').html('<div class="alert alert-error">Informe os dados corretos</div>').show(200).delay(5000).hide(200);
                                    return false;
                                }
                               
                            },
                            error: function () {
                                jQuery('#alert').html('<div class="alert alert-error">Erro ao efectuar a opera&ccedil;&atilde;o</div>').show(200).delay(5000).hide(200);
                                return false;
                            }
                        });
                        return false;
                    }
                });
            });
        </script>
    </head>

    <body class="loginpage"style="background:#FFF;">

        <div class="loginpanel" >
            <div class="loginpanelinner" style="padding:50px;padding-left:70px;margin-top:-50px;padding-right:70px;background:#042a71;">
                <div class="logo animate0 bounceIn"><img style="width:260px;" src="images/logo1.png"></div>
                <form id="login" action="" method="post">
                   
                    <div class="inputwrapper animate1 bounceIn">
                        <input type="text" name="nome" id="nome" placeholder="Nome Utilizador" />
                    </div>
                    <div class="inputwrapper animate2 bounceIn">
                        <input type="password" name="senha" id="senha" placeholder="Palavra-Passe" />
                    </div>
                    <div class="inputwrapper animate3 bounceIn">
                        <button name="submit" id="login"style="color:#fff; background:green;border:1px solid green;"><i style="color:#fff; font-size:14pt;"class="iconfa iconfa-circle-arrow-up"></i>&nbsp;&nbsp;Iniciar sessão </button>
                    </div>
 <div class="inputwrapper login-alert" id="alert">

                    </div>
                </form>
            </div>
        </div>

        <div class="loginfooter">
            <p><a href="recuperarSenha.php">Click se esqueceste a palavra-passe !</a></p>
        </div>

    </body>
</html>
