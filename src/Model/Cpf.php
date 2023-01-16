<?php
class Cpf
{
    private string $cpf;
    private const PESO_10 = 10;
    private const PESO_11 = 11;

    public function __construct(string $cpf)
    {
        $formatacaoValida = $this->validaFormatacao($cpf);
        $validacaoDigitosVerificadores = $this->validaDigitosVericadores($cpf);

        if ($validacaoDigitosVerificadores === false OR $formatacaoValida === false){
            header("Location: index.php?erro=CPF");
            die();
        }

        $this->cpf = $this->limpaFormatacao($cpf);
    }
    private function validaFormatacao(string $cpf): bool
    {
        return  preg_match("/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/", $cpf);
    }

    private function validaDigitosVericadores($cpf):bool
    {
        $cpfSemFormatacao = $this->limpaFormatacao($cpf);

        $cpfCom9PrimeirosDigitos = substr($cpfSemFormatacao,0,9);

        $primeiroDigitoVerificador = $this->calculaDigitoVerificador($cpfCom9PrimeirosDigitos, self::PESO_10);

        $cpfCom10PrimeirosDigitos = $cpfCom9PrimeirosDigitos . $primeiroDigitoVerificador;

        $segundoDigitoVerificador = $this->calculaDigitoVerificador($cpfCom10PrimeirosDigitos, self::PESO_11);

        $cpfAposValidacao = $cpfCom9PrimeirosDigitos . $primeiroDigitoVerificador . $segundoDigitoVerificador;


        if ($cpfSemFormatacao != $cpfAposValidacao){
            return false;
        }

        return true;
    }

    private function limpaFormatacao(string $cpf): string
    {
        return str_replace(['.','-'],"",$cpf);
    }

    public function recuperaNumero(): ?string
    {
        return $this->cpf;
    }

    private function calculaDigitoVerificador(string $numeroCpf, int $pesoMultiplicadores):string
    {
        $cpfArray = str_split($numeroCpf);
        $tamanhoCpf = count($cpfArray);

        for ($i = 0; $i < $tamanhoCpf; $i++){
            $resultadoMultiplicacao[$i]  = $cpfArray[$i] * $pesoMultiplicadores;
            $pesoMultiplicadores--;
        }

        $somaDoCpf = array_sum($resultadoMultiplicacao);

        $restoDaDivisao = $somaDoCpf % 11;


        if ($restoDaDivisao < 2){
            return 0;
        }

        $resultadoSubtracao = 11 - $restoDaDivisao;

        return $resultadoSubtracao;
    }
}