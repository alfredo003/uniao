<!DOCTYPE html>

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
        // dynamic table
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
<?php
include_once 'config/conexaoBD.php';
$pdo = ligar::chamar_bd();
$Pegar_membros=$pdo->prepare("SELECT * From  utilizador order by nome");
$Pegar_membros->execute();
?>
        <div class="mainwrapper">

            <div class="header">
                <div class="logo">
                  <a href="home.php"><img style="width:200px;margin-top:-28px;" src="images/logo1.png"></a>
               
                </div>
                <div class="headerinner">
                    <ul class="headmenu">
                        <li class="right">
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
                                            
                                            <h2 class="subtitle1">Lista de Utilizador do Sistema</h2></center>
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
                            <th width="19%" class="head0">Nome Próprio</th>
                      
                            <th width="19%" class="head1">Genero</th>
                            <th width="17%" class="head0">Nº Telefone</th>
                            <th width="17%" class="head0">Utilizador</th>
                            <th width="13%" class="head0">Função na Igreja</th>
                           <th width="12%" class="head0">Operações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($Linha = $Pegar_membros->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr class="gradeX">
                          <td class="aligncenter"><span class="center"> <?php echo $m=+1; ?> </td>
                            <td> <?php echo $Linha['nome']; ?></td>
                             <td> <?php echo $Linha['genero']; ?></td>
                            <td> <?php echo $Linha['telefone']; ?></td>
                            <td> <?php echo $Linha['nomeUtil']; ?></td>
                            <td> <?php echo $Linha['idfuncao']; ?></td>
                           
                            
                            <td>
                                <a class="btn btn-info" style="color:#fff;" href="<?=base64_encode($Linha['id'])?>">+ Detalhes</a></td>
                            
                        </tr>
                     <?php } ?>
                    </tbody>
                    
                </table>
                <a href="" style="background:#042a71;color:#fff;border:1px solid #042a71;"class="text-left btn btn-warning"><i class="iconfa-print"></i>  Imprimir</a>
                
                <div class="footer">
                    
                    <div class="footer-right">
               
                    </div>
                </div>
            
            </div>
            </div>

        </div>

    </body>
</html>
