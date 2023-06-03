   
<!DOCTYPE html>
<?php
include_once 'config/conexaoBD.php';
$pdo = ligar::chamar_bd();
$Pegar_membros=$pdo->prepare("SELECT * From  pessoa");
$Pegar_membros->execute();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>BDgenesis</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="css/responsive-tables.css">

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/modernizr.min.js"></script>
<script type="text/javascript" src="js/responsive-tables.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        
        jQuery('#dyntable').dataTable({
            "sPaginationType": "full_numbers",
            "aaSortingFixed": [[0,'asc']],
            "fnDrawCallback": function(oSettings) {
                jQuery.uniform.update();
            }
        });
        
        jQuery('#dyntable2').dataTable( {
            "bScrollInfinite": true,
            "bScrollCollapse": true,
            "sScrollY": "300px"
        });
        
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
                        <li class="right" style="border:none;">
                            <?php include 'span.php';?>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="leftpanel">
                <?php include_once './menuPrincipal.php';?>
            </div>

            <div class="rightpanel">

                <ul class="breadcrumbs">
                    <li><i class="iconfa-desktop"></i> <span class="separator"></span></li>
                <li>BDgenesis / Listagem de Membros /</li>
                 
                </ul>

 <div class="maincontent">
            <div class="maincontentinner">
            
                          <ul class="hormenu anchor" style="margin-bottom: 3px;background:#042a71;color: #fff;"><br><br><center>
                                            
                                            <h2 class="subtitle1">Lista de Ouvintes da Igreja</h2></center>
                                       <br><br>
                                    </ul>
                <table id="dyntable" class="table table-bordered responsive table-hover ">
                    <colgroup>
                        <col class="con0" style="align: center; width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                          	<th width="22%" class="head0 nosort">Cod</th>
                            <th width="19%" class="head0">Nome</th>
                            <th width="13%" class="head1">Pai</th>
                            <th width="19%" class="head1">Mae</th>
                            <th width="17%" class="head0">Genero</th>
                            <th width="10%" class="head0">naturalidade</th>
                               <th width="17%" class="head0">B.I.Nº</th>
                            <th width="10%" class="head0">Estado Civil</th> 
                            <th width="17%" class="head0">Idade</th>
                           
                             <th width="10%" class="head0">Operações</th>
                            
                        </tr>
                    </thead>
                   <tbody>
                    <?php while ($Linha = $Pegar_membros->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr class="gradeX">
                          <td class="aligncenter"><span class="center"> <?php echo $m=+1; ?> </td>
                            <td> <?php echo $Linha['Nome']; ?></td>
                            <td> <?php echo $Linha['pai']; ?></td>
                            <td> <?php echo $Linha['mae']; ?></td>
                            <td> <?php echo $Linha['genero']; ?></td>
                            <td> <?php echo $Linha['naturalidade']; ?></td>
                            <td> <?php echo $Linha['Numero']; ?></td>
                            <td> <?php echo $Linha['estadoCivil']; ?></td>
                            <td> <?php echo $Linha['data']; ?></td>
                            <td>
                                <a class="btn btn-info" style="color:#fff;" href="<?=base64_encode($Linha['id'])?>">+ Detalhes</a></td>
                            
                        </tr>
                     <?php } ?>
                    </tbody>
                    
                </table>
                <a href="imprimir/lista.php" style="background:#042a71;color:#fff;border:1px solid #042a71;" class="text-left btn btn-warning"><i class="iconfa-print"></i>  Imprimir Todos</a>
                
                <div class="footer">
                    
                    <div class="footer-right">
               
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
