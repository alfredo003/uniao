<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BDgeneses</title>
        <link rel="stylesheet" href="css/style.default.css" type="text/css">
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="js/jquery.cookie.js"></script>
        <script type="text/javascript" src="js/modernizr.min.js"></script>
        <script type="text/javascript" src="js/jquery.smartWizard.min.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
        <script type="text/javascript">
    
    jQuery(document).ready(function () {
                // Smart Wizard 	
                jQuery('#wizard').smartWizard({onFinish: onFinishCallback});
                jQuery('#wizard2').smartWizard({onFinish: onFinishCallback});
                jQuery('#wizard3').smartWizard({onFinish: onFinishCallback});

                function onFinishCallback() {

                       var nome = jQuery('#nome').val();
                     var dataNasc = jQuery('#dataNasc').val();
                    var genero = jQuery('#genero').val();
                    var telefone = jQuery('#telefone').val();
                    var nomeUtil = jQuery('#nomeUtil').val();
                    var senha = jQuery('#senha').val();
                    var cargo = jQuery('#cargo').val();
                    var foto = jQuery('#foto').val(); 
                    jQuery.ajax({
                        
                        type: 'POST',
                        url: 'controller/utilizador.php',
                        data: {n: nome, d: dataNasc, g: genero, t: telefone, s: senha, c: cargo, nu: nomeUtil,f: foto},
                        beforeSend: function () {

                        },
                        success: function (dados) {
                            if (dados.trim() === 'sucesso') {
                                jQuery('#alerta').html('<h4 class="widgettitle title-success">Utilizador Cadastrado com sucesso</h4>').show(200).delay(5000).hide(200);
                                 jQuery('#nome').val("");
                                 jQuery('#dataNasc').val("");
                                  jQuery('#genero').val("");
                                  jQuery('#telefone').val("");
                                  jQuery('#senha').val("");
                                  jQuery('#cargo').val("");
                                  jQuery('#nomeUtil').val("");
                                  jQuery('#foto').val("");
          
            return false;
                            } else if (dados.trim() === 'erro') {
                                jQuery('#alerta').html('<h4 class="widgettitle title-danger">Erro no cadastro do utilizador</h4>').show(200).delay(5000).hide(200);
                                return false;
                            }
                            return false;
                        },
                        error: function () {
                            jQuery('#alerta').html('<h4 class="widgettitle title-danger">Erro no cadastro do utilizador</h4>').show(200).delay(5000).hide(200);
                            return false;
                        }
                    });
                    return false;
                }

                jQuery('select, input:checkbox').uniform();

            });
        
        </script>
    </head>
    <body>

        <div class="mainwrapper">

            <div class="header">
                <div class="logo">
                    <a href="home.php"><img style="width:200px;margin-top:-28px;" src="images/logo1.png"></a>
                </div>
                <div class="headerinner">
                    <ul class="headmenu">
                        <li class="right" style="border-left:none">
                           <?php include_once 'span.php';?>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="leftpanel">
                <?php include_once './menuPrincipal.php'; ?>
            </div>

            <div class="rightpanel">

                <ul class="breadcrumbs">
                    <li><i class="iconfa-desktop"></i><span class="separator"></span></li>
                    <li>BDgenesis / Cadastrar Utilizadores /</li>
                  
                </ul>
<?php
include_once 'config/conexaoBD.php';
$pdo = ligar::chamar_bd();
$Pegar_membros=$pdo->prepare("SELECT * From  Funcoes order by nome");
$Pegar_membros->execute();
?>
                <div class="maincontent">
                    <div class="maincontentinner">
                        <div class="row-fluid">
<br>
<center><div id="alerta"></div></center>
                           
                         <br> 
                         <form class="stdform" id="ev"method="Post" action="Cadastrar_Utilizador.php">
                                <div id="wizard" class="wizard"  >
                                   
                                  
                                    <ul class="hormenu anchor" style="margin-bottom: 3px;background:#042a71;color: #fff;"><br><br><center>
                                            
                                            <h2 class="subtitle1">Cadastrar Utilizador do Sistema</h2></center>
                                        
                                        <li>
                                            <a href="#wiz1step1" style="background:#042a71;border: 1px solid #042a71; " class="selected" isdone="1" rel="1">
                                                
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#wiz1step2" style="background:#042a71 ;border: 1px solid #042a71;" class="done" isdone="1" rel="2">
                                            
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#wiz1step3" style="background:#042a71 ;border: 1px solid #042a71;" class="done" isdone="1" rel="3">
                                                
                                            </a>
                                        </li>
                                    </ul>


                              
  <br>  <br>
                                    <div class="stepContainer" style="height: 237px;border: none;"><div  id="wiz1step1" class="formwiz content" style="display: block;">
                                      

                                            <p>
                                                <label>Nome completo</label>
                                                <span class="field"><input type="text" id="nome" name="nome" class="input-xxlarge"></span>
                                            </p>

                                            <p>
                                                <label>Data de nascimento</label>
                                                <span class="field"><input type="date" id="dataNasc" name="dataNasc" class="input-xxlarge"></span>
                                            </p>

                                            <p>
                                                <label>Genero</label>
                                                <span class="field">
                                                    <div class="selected" id="uniform-selection">
                                                        <select id="genero" name="genero" class="uniformselect" >
                                                            <option value="Femenino">Femenino</option>
                                                            <option value="Masculino">Masculino</option>
                                                        </select>
                                                    </div>
                                                </span>
                                            </p>
                                         
                                            <p>
                                                <label>Telefone</label>
                                                <span class="field"><input type="tel"id="telefone" name="telefone" class="input-xxlarge"></span>
                                            </p>


                                        </div>
                                        <div id="wiz1step2"  class="formwiz content" style="display: none;">
                                           

                                            <p>
                                                <label> Nome de utilizador</label>
                                                <span class="field"><input type="text" id="nomeUtil" class="input-xxlarge"></span>
                                            </p>
                                            <p>
                                                <label>Senha</label>
                                                <span class="field"><input type="password" id="senha" class="input-xxlarge"></span>
                                            </p>
                                              <p>
                                                <label>Função na Igreja</label>
                                              <span class="field">
                                                    <div class="selected" id="uniform-selection">
                                                        <select id="funcoes" class="uniformselect" >
                                                            <option>---------</option>
                                                            <?php while ($Linha = $Pegar_membros->fetch(PDO::FETCH_ASSOC)) { ?>
                                                            <option value="<?php echo $Linha['id_funcao']; ?>"><?php echo $Linha['nome']; ?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </span>
                                            </p>
                                            
                                            <p><label>Foto de Perfil</label>
                                               <input type="file" id="foto" name="foto" />
                                            </p>

                                        </div>
                                        <div id="wiz1step3" class="content" style="display: none;">
                                        
                                            <div class="par terms" style="padding: 0 20px;">
                                                <h1 class="text-center"><img src="images/v.png"></h1>
                                               <BR>
                                                <BR>
                                                 <BR>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="footer">

                            <div class="footer-right">
                      
                    </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
       
        <script type="text/javascript">
            jQuery(document).ready(function () {

                // simple chart
                var flash = [[0, 11], [1, 9], [2, 12], [3, 8], [4, 7], [5, 3], [6, 1]];
                var html5 = [[0, 5], [1, 4], [2, 4], [3, 1], [4, 9], [5, 10], [6, 13]];
                var css3 = [[0, 6], [1, 1], [2, 9], [3, 12], [4, 10], [5, 12], [6, 11]];

                function showTooltip(x, y, contents) {
                    jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css({
                        position: 'absolute',
                        display: 'none',
                        top: y + 5,
                        left: x + 5
                    }).appendTo("body").fadeIn(200);
                }


                var plot = jQuery.plot(jQuery("#chartplace"),
                        [{data: flash, label: "Flash(x)", color: "#6fad04"},
                            {data: html5, label: "HTML5(x)", color: "#06c"},
                            {data: css3, label: "CSS3", color: "#666"}], {
                    series: {
                        lines: {show: true, fill: true, fillColor: {colors: [{opacity: 0.05}, {opacity: 0.15}]}},
                        points: {show: true}
                    },
                    legend: {position: 'nw'},
                    grid: {hoverable: true, clickable: true, borderColor: '#666', borderWidth: 2, labelMargin: 10},
                    yaxis: {min: 0, max: 15}
                });

                var previousPoint = null;
                jQuery("#chartplace").bind("plothover", function (event, pos, item) {
                    jQuery("#x").text(pos.x.toFixed(2));
                    jQuery("#y").text(pos.y.toFixed(2));

                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;

                            jQuery("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                    y = item.datapoint[1].toFixed(2);

                            showTooltip(item.pageX, item.pageY,
                                    item.series.label + " of " + x + " = " + y);
                        }

                    } else {
                        jQuery("#tooltip").remove();
                        previousPoint = null;
                    }

                });

                jQuery("#chartplace").bind("plotclick", function (event, pos, item) {
                    if (item) {
                        jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
                        plot.highlight(item.series, item.datapoint);
                    }
                });


                //datepicker
                jQuery('#datepicker').datepicker();

                // tabbed widget
                jQuery('.tabbedwidget').tabs();



            });
        </script>
    </body>
</html>
