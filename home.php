
<!DOCTYPE html>
<html>
    <head lang="pt-pt">
        <title>BDgênesis</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/style.default.css" type="text/css" />
         <link rel="stylesheet" href="css/responsive-tables.css">
     
   <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
        <script type="text/javascript" src="js/modernizr.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.cookie.js"></script>
        <script type="text/javascript" src="js/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="js/flot/jquery.flot.min.js"></script>
        <script type="text/javascript" src="js/flot/jquery.flot.resize.min.js"></script>
        <script type="text/javascript" src="js/responsive-tables.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
                <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
    </head>
<style>
    
    iframe#iframe{
	margin-top:-30px;
	width:1000px;
	height:600px;
	border:none;
	margin-left:80px;
	
}
iframe#iframe::-webkit-scrollbar{
    display: none;
}
</style>
    <body class="wrapper">

        <div class="wrapper" >

            <div class="header"style="background:#042a71;color:#fff;">
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
                    <li>BDgenesis / Pagina Inicial</li>
                 
                </ul>

                <div class="maincontent">
                    <div class="maincontentinner">
                        <div class="row-fluid">
                            <div id="dashboard-left" class="span8">
                              
                                <iframe id="iframe" src="iframe_home/index.php"></iframe>    
                                <div style="margin-left:150px;width:800px">
                                <center>    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
                                        
                                    </p></center>
                          
                               </div>
                               <br/>


                            </div>

                            
                        </div>
                       
                        <div class="footer">

                            <div class="loginfooter">
                                 </div>
                            <?php 
                            include_once('rodape.php');
                            ?>
                        </div>

                    </div>
                </div>

            </div>

        </div>
      
        </div><!--#myModal-->
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

                jQuery('#modalMarc').click(
                        function () {
                            alert('ola funciona');
                            jQuery.ajax({
                                type: 'POST',
                                url: 'ajax/funcionario.php',
                                data: {n: name, d: dataNasc, g: genero, t: telefone, m: morada, f1: func1, f2: func2},
                                beforeSend: function () {

                                },
                                success: function (dados) {
                                    if (dados.toString() === 'sucess') {
                                        jQuery('#notif').html('<h4 class="widgettitle title-success">Funcion&aacute;rio cadastrado com sucesso</h4>').show(200).delay(5000).hide(200);
                                        return false;
                                    } else if (dados.trim() === 'empt') {
                                        jQuery('#notif').html('<h4 class="widgettitle title-danger">Erro no cadastro do funcion&aacute;rio</h4>').show(200).delay(5000).hide(200);
                                        return false;
                                    }
                                    return false;
                                },
                                error: function () {
                                    jQuery('#notif').html('<h4 class="widgettitle title-danger">Erro no cadastro do funcion&aacute;rio</h4>').show(200).delay(5000).hide(200);
                                    return false;
                                }
                            });
                        }

                );

            });
        </script>
    </body>
</html>
