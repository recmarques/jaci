<?php

// variáveis sem tipagem definida
declare(strict_types=1);
// checagem de tipos

class ContaBancaria {

    // @var string
    // php 7.4 - private int $banco;
    private $banco;
    private $nomeTitular;
    private $numeroAgencia;
    private $numeroConta;
    // @var float
    private $saldo;

    public function __construct(
        string $banco,
        string $nomeTitular,
        string $numeroAgencia,
        string $numeroConta,
        float $saldo
    ){
        $this->banco = $banco;
        $this->nomeTitular = $nomeTitular;
        $this->numeroAgencia = $numeroAgencia;
        $this->numeroConta = $numeroConta;
        $this->saldo = $saldo;
    }

    public function obterSaldo()
    {
        return 'Saldo atual da conta: R$' . $this->saldo;
    }
    
    public function depositar(float $valor):string
    {
        $this->saldo += $valor;
        return 'Depósito de: ' . $valor . ' realizado!';
    }

    public function sacar(float $valor):string
    {
        $this->saldo -= $valor;
        return 'Saque de: ' . $valor . ' realizado!';
    }
}

// objeto = instancia da classe
$conta = new ContaBancaria(
    'Caixa Econômica Federal',
    'Renata Castro',
    '838-10',
    '232389-10',
    500.00
);
// quebra de execução de código, nada abaixo disso é executado
// exit();


var_dump($conta);
echo '<br /><br />';

// utilizar echo para mostrar o return nos métodos
echo $conta->obterSaldo();

echo '<br /><br />';
echo $conta->depositar(200.00);
echo '<br /><br />';
echo $conta->sacar(100.00);
echo '<br /><br />';
echo $conta->obterSaldo();
