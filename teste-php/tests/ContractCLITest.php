<?php

use PHPUnit\Framework\TestCase;

class ContractCLITest extends TestCase
{
    public function testListarComandoRetornaSaidaEsperada()
    {
        $output = shell_exec('php cli.php listar');
        
        if (str_contains($output, "Nenhum registro encontrado.")) {
            $this->assertStringContainsString("Nenhum registro encontrado.", $output);
            
        } else {
            $this->assertStringContainsString('nome_banco', $output);
            $this->assertStringContainsString('verba', $output);
            $this->assertStringContainsString('codigo_contrato', $output);
            $this->assertStringContainsString('data_inclusao', $output);
            $this->assertStringContainsString('valor', $output);
            $this->assertStringContainsString('prazo', $output);
        }
    }
}
