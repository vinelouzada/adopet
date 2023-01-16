<?php

require_once __DIR__."/src/Model/Cpf.php";
require_once __DIR__."/src/Model/Data.php";
require_once __DIR__."/src/Model/Telefone.php";
require_once __DIR__."/src/Model/Endereco.php";
require_once __DIR__."/src/Model/Cnpj.php";
require_once __DIR__ . "/src/Model/Pessoa.php";
require_once __DIR__. "/src/Model/PessoaFisica.php";
require_once __DIR__. "/src/Model/PessoaJuridica.php";

$nomeForm = filter_input(INPUT_POST,"nome");
$emailForm = filter_input(INPUT_POST,"email");
$cpfForm = filter_input(INPUT_POST,"cpf");
$cnpjForm = filter_input(INPUT_POST,"cnpj");
$cepForm = filter_input(INPUT_POST,"cep");
$cidadeForm = filter_input(INPUT_POST,"cidade");
$logradouroForm = filter_input(INPUT_POST,'logradouro');
$bairroForm = filter_input(INPUT_POST,"bairro");
$estadoForm = filter_input(INPUT_POST,'estado');
$numeroForm = filter_input(INPUT_POST,'numero');
$dataForm = filter_input(INPUT_POST, "data");
$telefoneForm = filter_input(INPUT_POST,"telefone");


$endereco = new Endereco($cepForm,$cidadeForm,$estadoForm, $logradouroForm, $bairroForm, $numeroForm);
$data = new Data($dataForm);
$telefone = new Telefone($telefoneForm);

if ($cpfForm !== null){
    $cpf = new Cpf($cpfForm);
    $pessoa = new PessoaFisica($nomeForm,$emailForm,$cpf,$endereco,$data,$telefone);
}

if($cnpjForm !== null){
    $cnpj = new Cnpj($cnpjForm);
    $pessoa = new PessoaJuridica($nomeForm,$emailForm,$cnpj,$endereco,$data,$telefone);
}


echo json_encode($pessoa);

