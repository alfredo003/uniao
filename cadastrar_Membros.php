<!DOCTYPE html>
<html>
    <head>
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
                	
                jQuery('#wizard').smartWizard({onFinish: onFinishCallback});
                jQuery('#wizard2').smartWizard({onFinish: onFinishCallback});
                jQuery('#wizard3').smartWizard({onFinish: onFinishCallback});
    
                function onFinishCallback() {

                    var nome = jQuery('#nomeComp').val();
                    var pai = jQuery('#pai').val();
                    var mae = jQuery('#mae').val();
                    var genero = jQuery('#genero').val();
                    var idProv = jQuery('#pronv').val();
                    var dataNasc = jQuery('#dataNasc').val();
                    var foto = jQuery('#foto').val();
                    var tipoS = jQuery('#TipoS').val();
                    var BI = jQuery('#BI').val();
                    var BI_data = jQuery('#BI_data').val();
                     var passaEm = jQuery('#passaEm').val();
                    var estadoC = jQuery('#estadoC').val();
                    var residente = jQuery('#residente').val();
                    var baptiza = jQuery('#baptiza').val();
                    var localBatiz = jQuery('#localBatiz').val();
                     var pastorB = jQuery('#pastorB').val();
                    var DataEm = jQuery('#DataEm').val();
                      var livroN = jQuery('#livroN').val();
                    var igreja = jQuery('#igreja').val();
                    jQuery.ajax({
                        type: 'POST',
                        url: 'controller/membros.php',
                        data: {n: nome, p: pai, ma: mae,g: genero, idP: idProv,pass:passaEm,li:livroN,pb:pastorB, dataN: dataNasc, ts: tipoS, B: BI, B_d: BI_data,r:residente,estc:estadoC,bat:baptiza,lb:localBatiz,dataE:DataEm,ig:igreja,fot:foto},
                        beforeSend: function () {

                        },
                        success: function (dados) {
                            if (dados.trim() === 'sucesso') {
                                jQuery('#alerta').html('<h4 class="widgettitle title-success">Utilizador cadastrado com sucesso</h4>').show(200).delay(5000).hide(200);
                                jQuery('#nomeComp').val("");
                               jQuery('#pai').val("");
                               jQuery('#mae').val("");
                               jQuery('#genero').val("");
                               jQuery('#pronv').val("");
                               jQuery('#dataNasc').val("");
                               jQuery('#foto').val("");
                               jQuery('#TipoS').val("");
                               jQuery('#BI').val("");
                               jQuery('#BI_data').val("");
                               jQuery('#passaEm').val("");
                               jQuery('#estadoC').val("");
                               jQuery('#residente').val("");
                               jQuery('#baptiza').val("");
                               jQuery('#localBatiz').val("");
                               jQuery('#pastorB').val("");
                               jQuery('#DataEm').val("");
                               jQuery('#livroN').val("");
                               jQuery('#igreja').val("");
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
                    <li><i class="iconfa-desktop"></i> <span class="separator"></span></li>
                    <li>BDgenesis / Cadastrar Membros /</li>
                  
                </ul>

                <div class="maincontent">
                    <div class="maincontentinner">
                        <div class="row-fluid">
<br>
                           
                         <br> <center><div id="alerta"></div></center>
                            <form class="stdform" method="Post" action="">
                                <div id="wizard" class="wizard"  >
                                   
                                  
                                    <ul class="hormenu anchor" style="margin-bottom: 3px;background:#042a71;color: #fff;"><br><br><center><h2 class="subtitle1">Cadastrar Membro da Igreja</h2></center>
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

<?php
include_once 'config/conexaoBD.php';
$pdo = ligar::chamar_bd();
$Pegar_membros=$pdo->prepare("SELECT * From  Funcoes order by nome");
$Pegar_membros->execute();
?>
                              
                 <br>  <br>
                                    <div class="stepContainer" style="height: 237px;border: none"><div  id="wiz1step1" class="formwiz content" style="display: block;">
                                      

                                            <p>
                                                <label>Nome completo</label>
                                                <span class="field"><input type="text" id="nomeComp" class="input-xxlarge"></span>
                                            </p>

                                            <p>
                                                <label>Nome do Pai</label>
                                                <span class="field"><input type="text" id="pai" class="input-xxlarge"></span>
                                            </p>

                                            <p>
                                                <label>Nome da Mae</label>
                                               <span class="field"><input type="text" id="mae" class="input-xxlarge"></span>
                                            </p>
                                            <p>
                                                <label>Genero</label>
                                            
                                                    
                                                        <select id="genero" class="uniformselect" >
                                                            <option value="Femenino">Femenino</option>
                                                            <option value="Masculino">Masculino</option>
                                                        </select>
                                                <span style="margin-left:30px;"> Nº Telefone :&nbsp;&nbsp;<input type="text" placeholder="+255" id="livroN"class="input-medium form-inline"></span>
                                                  
                                                
                                            </p>
                                            
                                          
                                                <label>Naturalidade :</label>
                                       
                                                        <select id="provincia" class="uniformselect" >
                                                            <option value="0">--------</option>
                                               <option value="0">--------</option>
                                                                         
                                                        </select> &nbsp;&nbsp;&nbsp;&nbsp; ||&nbsp;&nbsp;&nbsp;&nbsp;
                                                 <select id="municipio" name="municipio" class="uniformselect" >
                                                          <option value="0">--------</option>
                                                        </select>&nbsp;&nbsp;&nbsp;&nbsp;   ||&nbsp;&nbsp;&nbsp;&nbsp;
                                                 <select id="pronv" class="uniformselect" >
                                                            <option value="0">--------</option>
                                                        </select>
                                                   
                                       
                                           
                                            <p>
                                                <label>Data de Nascimento</label>
                                                <span class="field"><input type="date"id="dataNasc" class="input-xxlarge"></span>
                                            </p>
                                            <p>
                                                <label>Foto</label>
                                                <span class="field"><input type="file"id="foto" class="input-xxlarge"></span>
                                            </p>


                                        </div>
                                        <div id="wiz1step2"  class="formwiz content" style="display: none;">
                                           
<p>
                                                <label>Tipo Saguinío</label>
                                                <span class="field"><input type="text" id="TipoS" class="input-xxlarge"></span>
                                            </p>
                                            <p>
                                                <label>B.I.Nº</label>
                                                <span class="field"><input type="text" id="BI" class="input-xxlarge"></span>
                                            </p>
                                            <p>
                                                <label>Passado em</label>
                                                <span class="field"><input type="text"  id="passdoEm"class="input-xxlarge form-inline"></span>
                                            <label>aos</label>
                                            <span class="field"><input type="date" id="BI_data" class="input-xxlarge"></span>
                                           
                                            </p>
                                            <p>
                                                <label>Estado Civil</label>
                                                <span class="field">
                                                    <div class="selected" id="uniform-selection">
                                                        <select id="estadoC" class="uniformselect" style="opacity: 0;">
                                                            <option value="Solteiro">Solteiro</option>
                                                            <option value="Casado">Casado</option>
                                                            <option value="Casado">Viuvo</option>
                                                        </select>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Função na Igreja </b>:&nbsp;&nbsp;
                                                        <select id="funcoes">
                                                               <option>---------</option>
                                                            <?php while ($Linha = $Pegar_membros->fetch(PDO::FETCH_ASSOC)) { ?>
                                                            <option value="<?php echo $Linha['id_funcao']; ?>"><?php echo $Linha['nome']; ?></option>
                                                            <?php }?>
                                                        </select></span>
                                                  
                                                    </div>
                                                </span>
                                            </p>
                                             <p>
                                                <label>Residente</label>
                                                <span class="field"><input type="text" id="residente" class="input-xxlarge form-inline"></span>
                                            
                                            </p>
                                          

                                        </div>
                                        <div id="wiz1step3" class="content" style="display: none;">
                                        
                                            <div class="par terms" style="padding: 0 20px;">
                                 <p>
                                                <label>Baptizado aos </label>
                                                <span class="field"><input type="date" id="baptiza" class="input-xxlarge form-inline"></span>
                                            
                                            </p>
                                                <p>
                                                <label>Local</label>
                                                <span class="field"><input type="text" id="localBatiz" class="input-xxlarge form-inline"></span>
                                            
                                            </p>
                                                <p>
                                                <label>Data do Baptismo</label>
                                                <span class="field"><input type="date" id="DataEm" class="input-xxlarge form-inline"></span>
                                            
                                            </p>
                                              <p>
                                                <label>Congregação</label>
                                                <span class="field">
                                                    
                                                        <select id="igreja" class="uniformselect" style="opacity: 0;">
                                                            <option value="desactivo">Igreja Local</option>
                                                            <option value="activo">Activo</option>
                                                        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                           Livro Nº&nbsp;&nbsp;<input type="text" id="livroN"class="input-mini form-inline">
                                                  
                                                   
                                                </span>
                                                <p>
                                                <label>Pastor</label>
                                                
                                                    <div>
                                                        <input type="text" id="pastorB"class="input-xxlarge form-inline">
                                                    </div>
                                              
                                            </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="footer">

                   
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
