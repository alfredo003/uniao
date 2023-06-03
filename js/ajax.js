
var sucesso = '<div class="alert alert-success">Operação terminada com sucesso</div>';
var erro = '<div class="alert alert-error">Erro ao efectuar a operação</div>';
var aviso = '<div class="alert alert-warning">Informe os dados corretos</div>';
var bloque = '<div class="alert alert-block">Informações bloqueadas</div>';

$(document).ready(
        function () {
            ('#login').submit(
                    function () {
                        
                        return false;
                    }
            );
        }
);
