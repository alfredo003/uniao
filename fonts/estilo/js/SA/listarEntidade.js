
function ListarProv(){
    var dados = $(".pronv");
    dados.html("<option>-------------------</option>");
    $.ajax({
                type: "GET",
                data: "",
                url: "http://localhost/sigesta/modal/listarProv.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    $.each(resultadoObj, function(key,val){
                        var novaLinha = $(".pronv");
                        dados.append("<option value="+val.id+">"+val.nome+"</option>");
                    });
                }
            });
}

function ListarPais(){
    var dados = $(".paises");
    dados.html("<option>-------------------</option>");
    $.ajax({
                type: "GET",
                data: "",
                url: "././modal/listarPais.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    $.each(resultadoObj, function(key,val){
                        var novaLinha = $(".paises");
                        dados.append("<option value="+val.id+">"+val.nome+"</option>");
                    });
                }
            });
}

function listarEntidade(){
    var dados = $(".entidade");
    dados.html("<option>-------------------</option>");
    $.ajax({
                type: "GET",
                data: "",
                url: "././modal/listarEntidade.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    $.each(resultadoObj, function(key,val){
                        var novaLinha = $(".entidade");
                        dados.append("<option value="+val.id+">"+val.nome+"</option>");
                    });
                }
            });
}
function cursos(){
    var dados = $(".cursos");
    dados.html("<option>-------------------</option>");
    $.ajax({
                type: "GET",
                data: "",
                url: "././modal/listarCursos.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    $.each(resultadoObj, function(key,val){
                        var novaLinha = $(".cursos");
                        dados.append("<option value="+val.id+">"+val.nome+"</option>");
                    });
                }
            });
}

function AnoCurricular(){
    var dados = $(".anoC");
    dados.html("<option>-------------------</option>");
    $.ajax({
                type: "GET",
                data: "",
                url: "././modal/anoCurricular.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    $.each(resultadoObj, function(key,val){
                        var novaLinha = $(".anoC");
                        dados.append("<option value="+val.id+">"+val.Descricao+"</option>");
                    });
                }
            });
}
function AnoLectivo(){
    var dados = $(".anoLectivo");
    dados.html("<option>-------------------</option>");
    $.ajax({
                type: "GET",
                data: "",
                url: "././modal/anoLet.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    $.each(resultadoObj, function(key,val){
                        var novaLinha = $(".anoLectivo");
                        dados.append("<option value="+val.id+">"+val.Descricao+"</option>");
                    });
                }
            });
}
// listar TABELA
function listarMatricula(){
    var dados = $(".listdados");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "././modal/listarMatricula.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.Nome_Estudante+"</td><td>"+val.n_processo+"</td><td>"+val.curso+"</td><td>"+val.genero+"</td></tr>");
                        dados.append(novaLinha);
                    });
                }
            });
}

function sala(){
    var dados = $(".sala");
    dados.html("<option>-------------------</option>");
    $.ajax({
                type: "GET",
                data: "",
                url: "././modal/sala.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    $.each(resultadoObj, function(key,val){
                        var novaLinha = $(".anoLectivo");
                        dados.append("<option value="+val.id+">"+val.Descricao+"</option>");
                    });
                }
            });
}

function turma(){
    var dados = $(".turma");
    dados.html("<option>-------------------</option>");
    $.ajax({
                type: "GET",
                data: "",
                url: "././modal/turma.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    $.each(resultadoObj, function(key,val){
                        var novaLinha = $(".anoLectivo");
                        dados.append("<option value="+val.id+">"+val.Descricao+"</option>");
                    });
                }
            });
}