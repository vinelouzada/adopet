<?php

class Cnpj
{

    private string $cnpj;
    private const PESO_12= [5,4,3,2,9,8,7,6,5,4,3,2];
    private const PESO_13 = [6,5,4,3,2,9,8,7,6,5,4,3,2];

    public function __construct(string $cnpj)
    {
        $formatacaoValida = $this->validaFormatacao($cnpj);
        $validacaoDigitosVerificadores = $this->validaDigitosVerificadores($cnpj);

        if ($validacaoDigitosVerificadores === false OR $formatacaoValida === false){
            header("Location: index.php?erro=CNPJ");
            die();
        }

        $this->cnpj = $this->limpaFormatacao($cnpj);
    }

    private function validaFormatacao(string $cnpj):bool
    {
        return preg_match("/^[0-9]{2}\.[0-9]{3}\.[0-9]{3}\/[0-9]{4}\-[0-9]{2}$/", $cnpj);
    }

    private function limpaFormatacao(string $cnpj): string
    {
        return str_replace(['.','-','/'],"",$cnpj);
    }


    private function validaDigitosVerificadores(string $cnpj):bool
    {
        $cnpjSemFormatacao = $this->limpaFormatacao($cnpj);
        $cnpjCom12PrimeirosDigitos = substr($cnpjSemFormatacao,0,12);

        $primeiroDigitoVerificador = $this->calculaDigitoVerificador($cnpjCom12PrimeirosDigitos, self::PESO_12);

        $cnpjCom13PrimeirosDigitos = $cnpjCom12PrimeirosDigitos . $primeiroDigitoVerificador;

        $segundoDigitoVerificador = $this->calculaDigitoVerificador($cnpjCom13PrimeirosDigitos, self::PESO_13);

        $cnpjAposValidacao = $cnpjCom12PrimeirosDigitos . $primeiroDigitoVerificador . $segundoDigitoVerificador;

        if ($cnpjSemFormatacao != $cnpjAposValidacao){
            return false;
        }

        return true;
    }

    private function calculaDigitoVerificador(string $numeroCnpj, array $pesoMultiplicadores):string
    {
        $cnpjArray = str_split($numeroCnpj);
        $tamanhoCnpj = count($cnpjArray);

        for ($i = 0; $i < $tamanhoCnpj; $i++){
            $resultadoMultiplicacao[$i]  = $cnpjArray[$i] * $pesoMultiplicadores[$i];
        }

        $somaDoCnpj = array_sum($resultadoMultiplicacao);

        $restoDaDivisao = $somaDoCnpj % 11;

        if ($restoDaDivisao < 2){
            return 0;
        }

        $resultadoSubtracao = 11 - $restoDaDivisao;

        return $resultadoSubtracao;
    }


    public function recuperaNumero(): ?string
    {
        return $this->cnpj;
    }
}