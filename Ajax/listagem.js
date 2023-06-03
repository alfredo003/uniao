function ListarOuvintes(){
    var dados = $("#ouvintes");
    dados.html("<option>-------------------</option>");
    $.ajax({
                type: "GET",
                data: "",
                url: "../controller/listarMembro.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    $.each(resultadoObj, function(key,val){
                        var novaLinha = $("#ouvintes");
                        dados.append("<option value="+val.id+">"+val.nome+"</option>");
                    });
                }
            });
}

// listar TABELA
/*function listarOuvintes(){
    var dados = $(".listarDados");
     dados.html("<option>-------------------</option>");
    $.ajax({
                type: "GET",
                data: "",
                url: "../controller/listarMembro.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.Nome+"</td><td>"+val.pai+"</td><td>"+val.mae+"</td></tr>");
                        dados.append(novaLinha);
                    });
                }
            });
}
*/