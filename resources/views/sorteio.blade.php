<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Sorteio</title>
</head>
<style>
.pd {
    padding-left: 20px;
    padding-right: 20px;
}


/* Estilo para o switch */
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

.switch input {
    display: none;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    border-radius: 34px;
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    border-radius: 50%;
}

input:checked+.slider {
    background-color: #2196F3;
}

input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
}

input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
}
</style>

<body>

    <div class="container mt-5">
        <h2>Sorteio de Times</h2>
        <div class="row">


            <div class="col-md-4">
                <label for="inputPassword2" class="visually-hidden">Data da partida</label>
                <input type="date" class="form-control" id="inputPassword2" value="">
            </div>
            <div class="col-md-8"><label for="">Clique para realizar o sorteio</label>
                <button id="botaoAtivarDesativar" class="form-control btn-success">SORTEAR</button>
            </div>
        </div>
        <hr><br>
        <div class="row">
            <div class="col-md-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Nivel</th>
                            <th>Tipo</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($jogadores AS $j)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$j->name}} </td>
                            <td>
                                @switch($j->nivel)
                                @case(1)<span>Ruim</span>@break
                                @case(2)<span>Amador</span>@break
                                @case(3)<span>Médio</span>@break
                                @case(4)<span>Bom</span>@break
                                @case(5)<span>Ótimo</span>@break
                                @endswitch
                            </td>
                            <td>{{$j->tipo}}</td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="statusSwitch" data-id="{{ $j->jogadores_id }}"
                                        {{ ($j->check_confirmacao == '1') ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-md-7">

                






                <div id="atendimento"></div>


            </div>
        </div>
    </div>


    <script>
                var ativado = false;
                var botao = document.getElementById("botaoAtivarDesativar");
                botao.addEventListener("click", function() {
                    ativado = !ativado;
                    botao.textContent = ativado ? "Desativar" : "SORTEAR";
                    if (ativado) {
                        console.log("Ativado!");
                        $('#atendimento').load('https://fabiorangel.com.br/futebol/timesMontados/sim');
                    } else {
                        $('#atendimento').load('https://fabiorangel.com.br/futebol/timesMontados/nao');
                    }
                })
                </script>


                <script>
                $(document).ready(function() {

                    $('#atendimento').load('https://fabiorangel.com.br/futebol/timesMontados/nao');


                    $('.statusSwitch').on('change', function() {
                        var itemId = $(this).data('id');
                        var isChecked = $(this).prop('checked');
                        var newStatus = isChecked ? '1' : '0';

                        $('#atendimento').load('https://fabiorangel.com.br/futebol/timesMontados/nao');


                        console.log(newStatus);
                        console.log(itemId);

                        // Fazer uma requisição AJAX para a rota Laravel
                        $.ajax({
                            url: 'https://fabiorangel.com.br/futebol/check',
                            type: 'POST',
                            data: {
                                //_token: '{{ csrf_token() }}',
                                newStatus: newStatus,
                                itemId: itemId
                            },
                            success: function(response) {
                                // Atualizar o status na tabela
                                $('#status' + itemId).text(newStatus);
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    });
                });
                </script>





    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>