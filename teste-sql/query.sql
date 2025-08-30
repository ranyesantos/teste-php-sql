SELECT 
    b.nome AS nome_banco,
    c.verba AS verba,
    MIN(ct.data_inclusao) AS data_inclusao_mais_antiga,
    MAX(ct.data_inclusao) AS data_inclusao_mais_recente,
    SUM(ct.valor) AS soma_valores
FROM Tb_contrato ct
INNER JOIN Tb_convenio_servico cs ON ct.convenio_servico = cs.codigo
INNER JOIN Tb_convenio c ON cs.convenio = c.codigo
INNER JOIN Tb_banco b ON c.banco = b.codigo
GROUP BY b.nome, c.verba
ORDER BY b.nome, c.verba;