<?php

// Importar funcoes e variaveis
require_once ( "../validar/variaveis.php" );
require_once ( "../validar/funcoes.php" );

/* Validar se o usuário chegou a página via formulário
e limpar post */

formEnviado($_POST);
gerarMensagensErro($dados);
limparVetor($dados);
exibirMensagem($dados);

//var_dump($dados);
//var_dump($mensagem_erro);

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $acompanhamento = $_POST["acompanhamento"];
    $adicionais = $_POST["adicionais"];

}

function exibirMensagem($postArray){
    
    echo "<h2> Informações do Cliente</h2>";
    
    echo "Cliente: ";
    echo $postArray["nome"];
    echo "<br>Endereço: ";
    echo $postArray["endereco"];
    echo "<br>Número: ";
    echo $postArray["numero"];
    echo "<br>";    

    echo "<h2> Informações do Pedido</h2>";

    echo "Acompanhamento: ";
    global $acompanhamento;
    if($acompanhamento == "Arroz"){
        echo $postArray["acompanhamento"];
    }elseif($acompanhamento == "Macarrao"){
        echo $postArray["acompanhamento"];
    }elseif($acompanhamento == "Farofa"){
        echo $postArray["acompanhamento"];
    }else echo $postArray["acompanhamento"];

    echo "<br>Prato Principal: ";
    echo $postArray["prato_principal"];

    echo "<br>Adicionais: <br>";
    global $adicionais;
    if(isset($_POST["adicionais"])){
        foreach($_POST["adicionais"] as $adicionais){
            echo "- " .$adicionais. "<br>";
        }
    }else {
        echo "Adicional não informado";
    }


    global $aceitar;
    if(isset($_POST["aceitar"])){
        foreach($_POST["aceitar"] as $aceitar){
            echo "Confirmado";
        }
    }else {
        echo "Não confirmado:  ";
        echo "<a href = '../index.php'>Clique para redirecionar!</a>";
    }
    echo "<br>";
}

?>