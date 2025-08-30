<?php

namespace App\Queries;

use PDO;

class ContractQueries 
{
    private $pdo;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function listar(): array
    {
        try {
            $sql = "
                SELECT 
                    b.nome AS nome_banco,
                    c.verba AS verba,
                    ct.codigo AS codigo_contrato,
                    ct.data_inclusao AS data_inclusao,
                    ct.valor AS valor,
                    ct.prazo AS prazo
                FROM Tb_contrato ct
                INNER JOIN Tb_convenio_servico cs ON ct.convenio_servico = cs.codigo
                INNER JOIN Tb_convenio c ON cs.convenio = c.codigo
                INNER JOIN Tb_banco b ON c.banco = b.codigo
            ";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \RuntimeException("Erro ao listar contratos: " . $e->getMessage());
        }
    }
    
}
