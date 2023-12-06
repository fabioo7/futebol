<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botão Ativar/Desativar</title>
</head>
<body>

<button id="botaoAtivarDesativar">SORTEAR</button>

<script>
    // Variável para controlar o estado (ativado/desativado)
    var ativado = false;

    // Obter referência para o botão
    var botao = document.getElementById("botaoAtivarDesativar");

console.log(botao);

    // Adicionar um ouvinte de eventos para o clique no botão
    botao.addEventListener("click", function() {
        // Alternar o estado entre ativado e desativado
        ativado = !ativado;
        console.log(botao);
        console.log(ativado);


        // Atualizar o texto do botão com base no estado atual
        botao.textContent = ativado ? "Desativar" : "Ativar";

        // Coloque aqui o código que você deseja executar quando o estado é alterado
        if (ativado) {
            console.log("Ativado!");
            // Código adicional para o estado ativado
        } else {
            console.log("Desativado!");
            // Código adicional para o estado desativado
        }
    });
</script>

</body>
</html>
