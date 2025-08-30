<?php

require __DIR__ . '/vendor/autoload.php';

use App\Queries\ContractQueries;
use App\Db\Connection;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$pdo = Connection::getPDO();

$comando = $argv[1] ?? null;
$consulta = new ContractQueries($pdo);

switch ($comando) {

    case 'listar':
        $resultados = $consulta->listar();

        if (!empty($resultados)) {
            $colunas = array_keys($resultados[0]);
            echo implode(' | ', $colunas) . PHP_EOL;
            echo str_repeat('-', 50) . PHP_EOL;

            foreach ($resultados as $row) {
                echo implode(' | ', $row) . PHP_EOL;
            }
        } else {
            echo "Nenhum registro encontrado." . PHP_EOL;
        }
        break;

    default:
        echo "Comandos disponíveis:\n";
        echo "  listar                 → Lista todos os contratos\n";
        break;
}
