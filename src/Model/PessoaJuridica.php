<?php

class PessoaJuridica extends Pessoa implements JsonSerializable
{
    private Cnpj $cnpj;

    public function __construct(string $nome, string $email, Cnpj $cnpj, Endereco $endereco, DataNascimento $data, Telefone $telefone)
    {
        parent::__construct($nome, $email, $endereco, $data, $telefone);

        $this->cnpj = $cnpj;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'nome' => $this->nome,
            'email'=> $this->email,
            'cnpj' => $this->cnpj->recuperaNumero(),
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