<?php

include_once 'Conexao.php';
include_once 'sessoes.php';
include_once 'ClassPessoa.php';
include_once 'ClassFuncionario.php';

$Valor_Prof = filter_input(INPUT_POST, "marcar");

$busca_Prof = ConexaoBD::connexao()->prepare("SELECT * FROM funcionario  WHERE  n_agente = '$Valor_Prof'");
$busca_Prof->execute();

$Profe_Busca = $busca_Prof->fetch(PDO::FETCH_ASSOC);
$Profe_Busca_pessoa = $Profe_Busca['idpessoa'];
$Profe_Busca_funcionario = $Profe_Busca['idfuncionario'];

$busca_Prof_ = ConexaoBD::connexao()->prepare("SELECT * FROM pessoa  WHERE  idpessoa = $Profe_Busca_pessoa");
$busca_Prof_->execute();

$Profe_Busca_ = $busca_Prof_->fetch(PDO::FETCH_ASSOC);

$Profe_Busca_Nome = $Profe_Busca_['nome'];
$buscar_prof_func = ConexaoBD::connexao()->prepare("SELECT * FROM horario WHERE  idFuncionario = $Profe_Busca_funcionario");
$buscar_prof_func->execute();

$Laco_busca_prof_func = $buscar_prof_func->fetch(PDO::FETCH_ASSOC);


//echo $Valor_Prof ."  ". $Profe_Busca_pessoa . "  ". $Profe_Busca_funcionario;


$pdo = ConexaoBD::connexao();
$Pegar_f = $pdo->prepare("SELECT * FROM funcionario");
$Pegar_f->execute();
$dat = date('Y-m-d');

function diasemana($data) {
    $ano = substr("$data", 0, 4);
    $mes = substr("$data", 5, -3);
    $dia = substr("$data", 8, 9);
    $diasemana = date("w", mktime(0, 0, 0, $mes, $dia, $ano));


    switch ($diasemana) {
        case"0": $diasemana = "Domingo";
            break;
        case"1": $diasemana = "Segunda";
            break;
        case"2": $diasemana = "Terça-Feira";
            break;
        case"3": $diasemana = "Quarta-Feira";
            break;
        case"4": $diasemana = "Quinta-Feira";
            break;
        case"5": $diasemana = "Sexta-Feira";
            break;
        case"6": $diasemana = "Sábado";
            break;
    }
    return $diasemana;
}

$dia_semana = diasemana($dat);

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>IMPN - Intituto M&eacute;dio Polit&eacute;cnico de Namibe "Pascoal Luvualo"</title>
        <link rel="stylesheet" href="css/style.default.css" type="text/css" />

        <link rel="stylesheet" href="css/responsive-tables.css">
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>

        <script type="text/javascript" src="js/flot/jquery.flot.min.js"></script>
        <script type="text/javascript" src="js/flot/jquery.flot.resize.min.js"></script>

        <link rel="stylesheet" href="css/style.default.css" type="text/css" />
        <link rel="stylesheet" href="css/responsive-tables.css">

        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/jquery.cookie.js"></script>
        <script type="text/javascript" src="js/modernizr.min.js"></script>
        <script type="text/javascript" src="js/responsive-tables.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
        <script type="text/javascript">
            
            jQuery(document).ready(function () {
                // dynamic table
                
                
                jQuery('#dyntable').dataTable({
                    "sPaginationType": "full_numbers",
                    "aaSortingFixed": [[0, 'asc']],
                    "fnDrawCallback": function (oSettings) {
                        jQuery.uniform.update();
                    }
                });

                jQuery('#dyntable2').dataTable({
                    "bScrollInfinite": true,
                    "bScrollCollapse": true,
                    "sScrollY": "300px"
                });

            });
        </script>
        <script type="text/javascript">
            /*
             function openVentana(){
             $(".myModal_").slideDown("slow");
             }
             function closeVentana(){
             $(".myModal_").slideUp("fast");
             }*/
        </script>
    </head>

    <body onload="IniciarHora();">

        <div class="mainwrapper">

            <div class="header">
                <div class="logo">
                    <a href="home.php"><img src="images/logo1.png" alt="" /></a>
                </div>
                <div class="headerinner">
                    <ul class="headmenu">
                        <li class="right">
                            <div class="userloggedinfo">
                                <img src="images/IMP.png" alt="" />
                                <div class="userinfo">
                                    <h5><?php echo $_SESSION['nome']; ?><small> - politecnico.com</small></h5>
                                    <ul>
                                        <li><a href="">Editar perfil</a></li>
                                        <li><a href="">Defini&ccedil;&otilde;es de conta</a></li>
                                        <li><a href="index.php?<?php echo sha1('sair') . '=' . sha1(true); ?>">Sair</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul><!--headmenu-->
                </div>
            </div>

            <div class="leftpanel">
<?php include_once './menuPrincipal.php'; ?>
            </div><!-- leftpanel -->

            <div class="rightpanel">

                <ul class="breadcrumbs">
                    <li><a href=""><i class="iconfa-home"></i></a> <span class="separator"></span></li>
                    <li>Sistema de Marca&ccedil;&atilde;o de Presen&ccedil;as</li>
                    <li class="right">
                        <a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-tint"></i> Cores</a>
                        <ul class="dropdown-menu pull-right skin-color">
                            <li><a href="default">Azul</a></li>
                            <li><a href="navyblue">Azul claro</a></li>
                            <li><a href="palegreen">Verde</a></li>
                            <li><a href="red">Vermelho</a></li>
                            <li><a href="green">Verde alfa&ccedil;e</a></li>
                            <li><a href="brown">Castanho</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="pageheader">
                    <form action="results.html" method="post" class="searchbar">
                        <input type="text" name="keyword" placeholder="..." />
                    </form>
                    <div class="pageicon"><span class="iconfa-table"></span></div>
                    <div class="pagetitle">
                        <h5>&nbsp;</h5>
                        <h1>Marcar Presença Com o Robim320</h1>

                    </div>
                </div><!--pageheader-->
                <div class="maincontent">
                    <div class="maincontentinner">
                        <center>
                            <style>
                                video#video{
                                    position: relative;
                                    left: 170px;
                                }
                            </style>
                            
                            <h1>Olhos do Robim320</h1>
                        </center>
                            <center >
        <video id="video" ></video>
        <canvas id="canvas"></canvas>
        <a onclick="Snap();" class="btn btn-inverse">Ver</a>
    </center>
    
        <script>
                            
            var video = document.getElementById("video");
            var canvas = document.getElementById("canvas");
            var context = canvas.getContext('2d');
            
            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.oGetUserMedia || navigator.msGetUserMedia;
            
            if(navigator.getUserMedia){
                navigator.getUserMedia({video:true}, streamWebCam, throwError);
            }else{
                document.write("Nao Suporta!");
            }
            
            
            function streamWebCam(stream){
                video.src = window.URL.createObjectURL(stream);
                video.play();
            }
            
            function throwError(error){
                slert(error.name);
            }
            
            function Snap(){
                canvas.width = video.clientWidth;
                canvas.height = video.clientHeight;
                context.drawImage(video, 100, 0);
            }
                            </script>
                        
                        <div class="footer">
                            <div class="footer-left">
                                <span>&copy; 2017. .</span>
                            </div>
                            <div class="footer-right">
                                <span>Desenvolvido para: <a href="http://themepixels.com/">Instituto Médio Politécnico do Namibe</a></span>
                            </div>
                        </div><!--footer-->

                    </div><!--maincontentinner-->
                </div><!--rightpanel-->

            </div><!--mainwrapper-->
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
<?php
