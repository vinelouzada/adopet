<?php

class Pessoa
{
    protected string $nome;
    protected string $email;
    protected Endereco $endereco;
    protected Data $data;
    protected Telefone $telefone;

    public function __construct(string $nome, string $email, Endereco $endereco, Data $data, Telefone $telefone)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->endereco = $endereco;
        $this->data = $data;
        $this->telefone = $telefone;
    }
}