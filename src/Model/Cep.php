<?php

class Cep
{
    private string $cep;

    public function __construct(string $cep)
    {
        $formatacaoValida = $this->validaFormatacao($cep);

        if ($formatacaoValida === false){
            header("Location: index.php?erro=1");
            die();
        }


        $this->cep = $this->limpaFormatacao($cep);
    }

    private function validaFormatacao(string $cep): bool
    {
        if (preg_match("/^[0-9]{5}\-[0-9]{3}$/", $cep) == false){
            return false;
        }

        return true;
    }

    private function limpaFormatacao(string $cep):string
    {
        return str_replace("-","",$cep);
    }

    public function recuperaNumero(): string
    {
        return $this->cep;
    }

}