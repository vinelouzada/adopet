<?php

class PessoaFisica extends Pessoa implements JsonSerializable
{
    private Cpf $cpf;

    public function __construct(string $nome, string $email, Cpf $cpf, Endereco $endereco, Data $data, Telefone $telefone)
    {
        parent::__construct($nome, $email, $endereco, $data, $telefone);

        $this->cpf = $cpf;
    }


    public function jsonSerialize(): mixed
    {
        return [
            'nome' => $this->nome,
            'email'=> $this->email,
            'cpf' => $this->cpf->recuperaNumero(),
            'cep' => $this->endereco->recuperaCep(),
            'cidade' => $this->endereco->recuperaCidade(),
            'estado' => $this->endereco->recuperaEstado(),
            'logradouro' => $this->endereco->recuperaLogradouro(),
            'bairro' => $this->endereco->recuperaBairro(),
            'numero' => $this->endereco->recuperaNumero(),
            'data-nascimento'=> $this->data->recuperaDataCompleta(),
            'telefone' =>$this->telefone->recuperaTelefone(),
        ];
    }
}