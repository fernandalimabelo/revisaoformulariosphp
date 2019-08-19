<?php

// Limpar dados para evitar possíveis scripts
function __e($input) {
    @$input = trim($input); //apagar espaços desnecessários
    @$input = stripslashes($input); //substitui uma barra por duas barras
    @$input = htmlspecialchars($input); //tudo que for html é substituído por caracteres especiais
    return $input;
}

function limparVetor($varPost) { //recebe a variável do post e chama a variável de escape
    $arrayLimpo = [];
    foreach ($varPost as $indice => $valor) { //pega o vetor e quebra, retirando os índices e colocando nas variáveis
        $arrayLimpo[$indice] = __e($valor);
    }
    return $arrayLimpo;
}

// Verificar se o formulário foi enviado
function formEnviado($postArray) { //recebe o array do post que foi enviado, acessa a global dados do arq. variaveis, verifica se foi enviado usando post
    global $dados;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Limpar post
        $dados = limparVetor($postArray);
        return true;
    } else {
        header('Location: ../index.php');
        die(); //pausa a página
    }
}

// Criar mensagem de erro
function gerarMensagensErro($postArray) { //pega o post acessa a global msg erro e verifica 
    global $mensagem_erro;
    if ($postArray["prato_principal"] == '') {
        $mensagem_erro["prato_principal_vazio"] = "Informe um prato principal <br>";
        echo "<a href = '../index.php'>Clique para redirecionar!</a>";

    }elseif ($postArray["acompanhamento"] == '') {
        $mensagem_erro["acompanhamento_vazio"] = "<h2> Informe o acompanhamento </h2> <br>";
        echo ($mensagem_erro["acompanhamento"]);
        echo "<a href = '../index.php'>Clique para redirecionar!</a>";

    }
}