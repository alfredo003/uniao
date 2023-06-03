function inserir(){
       jQuery(document).ready(function() {

           jQuery('#form-wizard').submit(function(){
      
         var nome = jQuery('#nome').val();
        var nomePai = jQuery('#NomePai').val();
        var nomeMae = jQuery('#NomeMae').val();
        var n_documento = jQuery('#n_documento').val();
        var dataNasc = jQuery('#dataNasc').val();
       var genero = jQuery('#genero').val();
        var TipoSaguinio = jQuery('#genero').val();
        var nacional = jQuery('#nacional').val();
        var IdPais_origem = jQuery('#pais').val();
        var Provincia_nasc = jQuery('#naturalidade').val();
        var tipoDocumento = jQuery('#tipoDocumento').val();
        var foto = jQuery('#foto').val();
        var telefone = jQuery('#telefone').val();
        var telemovel= jQuery('#telemovel').val();
        var fax = jQuery('#fax').val();
        var email = jQuery('#email').val();
     $.ajax({
        type: "POST",
        data: "n="+nome+"&p="+nomePai+"&m="+nomeMae+"&nd="+n_documento+"&g="+genero+"&data="+dataNasc+"&tipo="+
        tipoDocumento+"&fot="+foto+"&nat="+Provincia_nasc+"&orig="+IdPais_origem+"+&naci="+nacional+"&tipoS="+
        TipoSaguinio+"&tele="+telefone+"&telem="+telemovel+"&fa="+fax+"&em="+email,
        url: "./modal/inserirEntidade.php",
        
        
        success:function(resultado){
            if (resultado=="sucesso") {
                   $('#msg_entidade').html('<div class="alert alert-warning" role="alert"> <strong>Problema!</strong>Porfavor, preencha devidamente Todos os Campos</div>').show(300).delay(5000).hide(300);

            }else if(resultado=="erro"){

                    $('#msg_entidade').html('<div class="alert alert-warning" role="alert"> <strong>Problema!</strong>Ocorreu um erro ao fazer o Registo</div>').show(300).delay(5000).hide(300);

            }
            else{
//          jQuery('#nome').val("");
//             jQuery('#nomePai').val("");
//             jQuery('#nomeMae').val("");
//             jQuery('#n_documento').val("");
//             jQuery('#dataNasc').val("");
//              jQuery('#genero').val("");
//               jQuery('#genero').val("");
//               jQuery('#nacionalidade').val("");
//               jQuery('#pais').val("");
//                jQuery('#naturalidade').val("");
//                jQuery('#tipoDocumento').val("");
//                   jQuery('#foto').val("");
//                   jQuery('#fax').val("");
//                    jQuery('#telefone').val("");   
//                    jQuery('#telemovel').val("");
//                    jQuery('#email').val("");
                $('#msg_departamento').html('<div class="alert alert-success" role="alert"> <strong>Sucesso!</strong>Registo efetuado com sucesso.</div>').show(300).delay(5000).hide(300);
                    
                
            }

        }
    });
});
});
}
//Matricular os estudantes

function Matricular(){
       jQuery(document).ready(function() {

           jQuery('#matricular').submit(function(){
               
               
               
             var tipo_doc = JSON.stringify(documento);
             var n_doc = JSON.stringify(n_doc);
             var data_em = JSON.stringify(dta_emiss);
            var data_valid = JSON.stringify(data_valid);
             var estado= JSON.stringify(estado);
             
             var idEstudante = jQuery('#idEstudante').val();
             var n_estudante=jQuery('#n_estudante').val();
             var n_processo = jQuery('#n_processo').val();
             var curso = jQuery('#curso').val();
             var anoCurr = jQuery('#AnoCurr').val();
             var anoAcad = jQuery('#anoAcad').val();
             var servico = jQuery('#servicos').val();
             var formaP = jQuery('#formaP').val();
             var n_talao = jQuery('#n_talao').val();
             var ValorTalao = jQuery('ValorTalao').val();
       
     $.ajax({
        type: "POST",
        data: "idEst="+idEstudante+"&n_est="+n_estudante+"&n_p="+n_processo+"&c="+curso+"&anoAc="+anoAcad+"&anoC="+anoCurr
         +"&serv="+servico+"&for="+formaP+"&n_ta="+n_talao+"&Valor="+ValorTalao+"&tipo_d="+tipo_doc+"&n_do="+n_doc+"%data_m="+data_em+"&est="+estado,
         url: "./modal/inserirEstudantes.php",
        
        success:function(resultado){
            if (resultado=="erro") {
                   $('#msg_departamento').html('<div class="alert alert-warning" role="alert"> <strong>Problema!</strong>Porfavor, preencha devidamente Todos os Campos</div>').show(300).delay(5000).hide(300);

            }else if(resultado=="sucesso"){

                    $('#msg_entidade').html('<div class="alert alert-warning" role="alert"> <strong>Problema!</strong>Ocorreu um erro ao fazer o Registo</div>').show(300).delay(5000).hide(300);

            }
            else{
         
                $('#msg_entidade').html('<div class="alert alert-success" role="alert"> <strong>Sucesso!</strong>Registo efetuado com sucesso.</div>').show(300).delay(5000).hide(300);
                    
                
            }

        }
    });
            Adicionar_Documento(); 
    
});
});
}
var documento = new Array();
var n_doc = new Array();
var dta_emiss = new Array();
var data_valid = new Array();
var estado= new Array();

function Adicionar_Documento(){  
 console.log("click");
    $('#adicionar_f').on('click',function(){
        var doc =$('#documento').text();
        var n_document=$('#n_doc').val();
        
        if(doc.length == 0 || n_document==0){
            $('#msg_adicionar_produtos').html('<div class="alert alert-warning" role="alert"> <strong>Irregularidade! </strong>Preencha todos os campos.</div>').show(300).delay(2000).hide(300);
        }else{
        documento.push(parseInt($('#documento').val()));
        n_doc.push(parseFloat($('#n_doc').val()));
        dta_emiss.push(parseFloat($('#data_emissao').val()));
        data_valid.push(parseInt($('#dataValidade').val()));
        var opera="<button class='btn btn-mini'>Excluir</button>";
	$("#documentos").append('<tr><td><font color=black>'+$('#documento').val()+'</font></td><td><font color=black>'+$('#n_doc').val()+'</font></td><td><font color=black>'+$('#data_emissao').val()+'</font></td><td><font color=black>'+$('#data_emissao').val()+'<td>'+opera+'</td></tr>');
	
    }
    });
}



