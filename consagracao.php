<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-16">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BDgenesis</title>
        <link rel="stylesheet" href="css/style.default.css" type="text/css">
        
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
        <script type="text/javascript">
            jQuery(document).ready(function () {

                    
             jQuery('#frm_horario').submit(function(event){
		    var func = jQuery('#cod_func').val();
                    var classe = jQuery('#classe').val();
                    var curso = jQuery('#curso').val();
                    var dia = jQuery('#dia').val();
                    var hora = jQuery('#hora').val();
		    var turma = jQuery('#t').val();
                           event.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/Horario.php',
                        data: {func:func,classe:classe,curso:curso,dia:dia,hora:hora,turma:turma},
                        beforeSend: function () {

                        },
                        success: function (dados) {
                            if (dados.toString() == 'sucess') {
                                jQuery('#notif').html('<h4 class="widgettitle title-success">Horario do professor cadastrado com sucesso</h4>').show(200).delay(5000).hide(200);
                                return false;
                            } else if(dados.toString()=='erro'){
                                //  jQuery('#notif').html('<h4 class="widgettitle title-danger">Erro no cadastro do funcion&aacute;rio</h4>').show(200).delay(5000).hide(200);
                                jQuery('#notif').html('<h4 class="widgettitle title-success">Ocorreu um erro inesperado</h4>').show(200).delay(5000).hide(200);
                                return false;
                            }
                            return false;
                        },
                        error: function () {
                            jQuery('#notif').html('<h4 class="widgettitle title-success">gravissimo</h4>').show(200).delay(5000).hide(200);
                            return false;
                        }
                    });
                 

                //jQuery('select, input:checkbox').uniform();
                            });

            });
        </script>

    </head>
    <body>

        <div class="mainwrapper">

            <div class="header">
                <div class="logo">
                    <a href="home.php"><img style="width:200px;margin-top:-28px;" src="images/logo1.png" alt="" /></a>
                </div>
                <div class="headerinner">
                    <ul class="headmenu">
                        <li class="right" style="border-left:none">
                          

                               <?php include 'span.php';?>
                         
                        </li>
                    </ul>
                </div>
            </div>

            <div class="leftpanel">
                <?php include_once './menuPrincipal.php'; ?>
            </div>

            <div class="rightpanel">

                <ul class="breadcrumbs">
                    <li><a href=""><i class="iconfa-desktop"></i></a> <span class="separator"></span></li>
                    <li>Administração / Consagração de Crianças / </li>
                  
                </ul>

                <div class="maincontent">
                    <div class="maincontentinner">
                        <div class="widgetbox box-inverse">
				<div id="notif"></div>
                                <h4 class="widgettitle"><i class="iconfa-print"></i>&nbsp;&nbsp;&nbsp;CONSAGRAÇÃO DE CRIANÇAS</h4>
                            <div class="widgetcontent nopadding">
                                <form class="stdform stdform2" method="post" action="" id="frm_horario" name="frm_horario">
                                    <p>
                                        <label>Nome</label>
                                        <span class="field">
                                            
                                            <input type="text" class="" style="width: 100%">
                                        
                                        </span>
                                    </p>
                                   
                                    <p>
                                        <label>filho(a)</label>
                                           <span class="field">
                                               de : <input type="text" placeholder="Pai" class=""style="width: 40%"> e de : <input type="text"style="width: 40%" placeholder="Mãe" class="">
                                          
                                        </span>
                                    </p>

                                    <p> 
                                        <label>Dados da Criança :</label>
                                        <span class="field">
                                           &nbsp;&nbsp; <strong> Genero:</strong> 
                                           <select name="selection" id="dia" class="input-medium">
                                                <option value="Segunda">Masculino</option>
                                                <option value="Terça">Femenino</option>
                                                
                                            </select>

                          &nbsp;&nbsp; <strong> Data Nascimento:</strong> 
                                           
                          <input type="date" class="input-large">

                                    </p>

                                    <p >
                                    <center style="margin-left:-300px"><strong>PASTOR: </strong><BR>
                                        <input type="text" style="color: red">
                                       </center>
                                      <center style="margin-top: -53px;margin-left:300px"><strong>SECRETÁRIO: </strong><BR>
                                        <input type="text" style="color: red">
                                       </center>
                                    </p>
                                    <p class="stdformbutton">
                                   <button class="btn btn-primary">Consagrar</button>
                                        <button type="reset" class="btn">Cancelar</button>

                                    </p>
                                    


             
            
           
          </div>


</div>
</form>


 
                            </div>
                        </div>

                        <div class="footer">

                           
                            <div class="footer-right" >
                     <span style="padding-right:10px;">UIEA: <a href="#">União de Igreja Evangelica de Angola</a></span>
                           </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        
        <script src="Ajax/jquery-1.9.1.min.js"></script>
        <script src="Ajax/listagem.js"></script>
        <script type="text/javascript">
    ListarOuvintes();
        </script>
        <div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade in" id="myModal">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                <h3 id="myModalLabel">Modal Heading</h3>
            </div>
            <div class="modal-body">
                    </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn">Close</button>
                <button class="btn btn-primary">Save changes</button>
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



            });
        </script>

       
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="estilo/plugins/colorpicker/bootstrap-colorpicker.min.css">

<link rel="stylesheet" href="estilo/plugins/timepicker/bootstrap-timepicker.min.css">

<link rel="stylesheet" href="estilo/plugins/select2/select2.min.css">
<script src="estilo/plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="estilo/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="estilo/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="estilo/plugins/input-mask/jquery.inputmask.js"></script>
<script src="estilo/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="estilo/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="estilo/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="estilo/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="estilo/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="estilo/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="estilo/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="estilo/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="estilo/plugins/fastclick/fastclick.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>


    </body>
</html>
