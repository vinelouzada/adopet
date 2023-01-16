<?php

class Telefone
{
    private string $telefone;


    public function __construct(string $telefone)
    {
        $formatacaoValida = $this->validaFormatacao($telefone);

        if ($formatacaoValida === false) {
            header("Location: index.php?erro=1");
            die();
        }

        $this->telefone = $this->limpaFormatacao($telefone);

    }

    private function validaFormatacao(string $telefone):bool
    {
        if(preg_match("/^\([0-9]{2}\)\ [0-9]{5}\-[0-9]{4}$/", $telefone) === false){
            return false;
        }

        return true;
    }

    private function limpaFormatacao($telefone):string
    {
        return str_replace(["(",")","-"," "],"",$telefone);
    }

    public function recuperaTelefone(): string
    {
        return $this->telefone;
    }
}