
var sucesso = '<div class="alert alert-success">Opera��o terminada com sucesso</div>';
var erro = '<div class="alert alert-error">Erro ao efectuar a opera��o</div>';
var aviso = '<div class="alert alert-warning">Informe os dados corretos</div>';
var bloque = '<div class="alert alert-block">Informa��es bloqueadas</div>';

$(document).ready(
        function () {
            ('#login').submit(
                    function () {
                        
                        return false;
                    }
            );
        }
);
