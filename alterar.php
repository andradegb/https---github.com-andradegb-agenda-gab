<?php

function lerContatos()
{
    $contatos = [];
    
    if (file_exists('index.html')) {
        $json = file_get_contents('index.html');
        $contatos = json_decode($json, true);
    }
    
    return $contatos;
}

function escreverContatos($contatos)
{
    $json = json_encode($contatos, JSON_PRETTY_PRINT);
    file_put_contents('index.html', $json);
}

function alterarContato($nome, $novoNome, $novoEmail, $novoTelefone)
{
    $contatos = lerContatos();
    
    foreach ($contatos as &$contato) {
        if ($contato['nome'] == $nome) {
            $contato['nome'] = $novoNome;
            $contato['email'] = $novoEmail;
            $contato['telefone'] = $novoTelefone;
            break;
        }
    }
    
    escreverContatos($contatos);
}

alterarContato('João', 'João Silva', 'joao@gmail.com', '965478631');

?>
