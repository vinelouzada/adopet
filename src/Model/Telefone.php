<?php

class Telefone
{
    private string $telefone;

    public function __construct(string $telefone)
    {
        $formatacaoValida = $this->validaFormatacao($telefone);

        if ($formatacaoValida === false) {
            header("Location: index.php?erro=Telefone");
            die();
        }

        $this->telefone = $this->limpaFormatacao($telefone);

    }

    private function validaFormatacao(string $telefone):bool
    {
        return preg_match("/^\([0-9]{2}\) 9?[0-9]{4}\-[0-9]{4}$/", $telefone);
    }

    private function limpaFormatacao(string $telefone):string
    {
        return str_replace(["(",")","-"," "],"",$telefone);
    }

    public function recuperaTelefone(): string
    {
        return $this->telefone;
    }
}