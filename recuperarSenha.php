<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>BDgenesis</title>
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
                    var u = jQuery('#username').val();
                    var p = jQuery('#password').val();
                    if (u === '' && p === '') {
                        jQuery('#alert').html('<div class="alert alert-info">Digite as suas credenciais</div>').show(200).delay(5000).hide(200);
                        return false;
                    } else {
                        jQuery.ajax({
                            type: 'POST',
                            url: 'controller/Apagar.php',
                            data: {util: u, senha: p},
                            beforeSend: function () {

                            },
                            success: function (dados) {
                                //alert(dados.toString());
                                if (dados.trim() === 'sucess') {
                                    jQuery('#alert').html('<div class="alert alert-success">Opera&ccedil;&atilde;o terminada com sucesso</div>').show(200).delay(5000).hide(200);
                                    window.location = 'home.php';
                                    return false;
                                }  else if (dados.trim() === 'empt') {
                                    jQuery('#alert').html('<div class="alert alert-error">Informe os dados corretos</div>').show(200).delay(5000).hide(200);
                                    return false;
                                }
                              
                            },
                            error: function () {
                                jQuery('#alert').html('<div class="text-error">Erro ao efectuar a opera&ccedil;&atilde;o</div>').show(200).delay(5000).hide(200);
                                return false;
                            }
                        });
                        return false;
                    }
                });
            });
        </script>
    </head>

    <body class="loginpage">

        <div class="loginpanel">
            <div class="loginpanelinner">
                <div class="logo animate0 bounceIn"><h2><font color="white">Recuperar Senha</font></h2></div>
                <form id="login" action="" method="post">
                    
                    
                    <div class="inputwrapper animate2 bounceIn">
                        <input type="password" name="password" id="password" placeholder="Digite a sua Palavra-Passe" />
                    </div>
                      <div class="inputwrapper animate3 bounceIn">
                        <button name="submit"style="color:#fff; background:green;border:1px solid green;"><i style="color:#fff; font-size:14pt;"class="iconfa iconfa-search"></i>&nbsp;&nbsp;Pesquisar </button>
                    </div>
                    <center><div class="inputwrapper login-alert" id="alert">

                        </div></center>
                </form>
            </div>
        </div>

        <div class="loginfooter">
            <p><a href="index.php">Click para iniciar sessão na tua conta!</a></p>
        </div>

    </body>
</html>
