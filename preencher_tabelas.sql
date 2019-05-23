INSERT INTO `Escolaridade` (`codigoEscolaridade`, `descricaoEscolaridade`) VALUES
(1, 'Não Alfabetizado'),
(2, 'Alfabetização Incompleta'),
(3, 'Ensino Fundamental Incompleto'),
(4, 'Ensino Fundamental Completo'),
(5, 'Ensino Médio Incompleto - Médio 2º Ciclo (Científico, Técnico etc.)'),
(6, 'Ensino Médio Completo - Médio 2º Ciclo (Científico, Técnico etc.)'),
(7, 'Ensino Médio Especial'),
(8, 'Ensino Médio EJA (Supletivo)'),
(9, 'Superior Incompleto'),
(10, 'Superior Completo'),
(11, 'Pós Graduação (Aperfeiçoamento/Especialização/Mestrado/Doutorado)');

INSERT INTO `UF` (`codigoUF`, `descricaoUF`) VALUES
('AC', 'Acre'),
('AL', 'Alagoas'),
('AM', 'Amazonas'),
('AP', 'Amapá'),
('BA', 'Bahia'),
('CE', 'Ceará'),
('DF', 'Distrito Federal'),
('ES', 'Espírito Santo'),
('GO', 'Goiás'),
('MA', 'Maranhão'),
('MG', 'Minas Gerais'),
('MS', 'Mato Grosso do Sul'),
('MT', 'Mato Grosso'),
('PA', 'Pará'),
('PB', 'Paraíba'),
('PE', 'Pernambuco'),
('PI', 'Piauí'),
('PR', 'Paraná'),
('RJ', 'Rio de Janeiro'),
('RN', 'Rio Grande do Norte'),
('RO', 'Rondônia'),
('RR', 'Roraima'),
('RS', 'Rio Grande do Sul'),
('SC', 'Santa Catarina'),
('SE', 'Sergipe'),
('SP', 'São Paulo'),
('TO', 'Tocantins');

INSERT INTO `Estado_Civil` (`codigoEstadoCivil`, `descricaoEstadoCivil`) VALUES
(1, 'Solteiro'),
(2, 'Casado'),
(3, 'União Estável'),
(4, 'Separado'),
(5, 'Divorciado'),
(6, 'Viúvo');

INSERT INTO `Ocupacao` (`codigoOcupacao`, `descricaoOcupacao`) VALUES
(1, 'Estudante'),
(2, 'Desempregado'),
(3, 'Trabalhador'),
(4, 'Trabalha e Estuda'),
(5, 'Menor de 6 anos');

INSERT INTO `Raca_Cor` (`codigoRacaCor`, `descricaoRacaCor`) VALUES
(1, 'Branca'),
(2, 'Preta'),
(3, 'Amarela'),
(4, 'Parda'),
(5, 'Indígena'),
(9, 'Ignorado');

INSERT INTO `Vinculo` (`codigoVinculo`, `descricaoVinculo`) VALUES
(1, 'Empregado com carteira de trabalho assinada'),
(2, 'Empregado pelo regime jurídico dos funcionários públicos'),
(3, 'Militar do exército, marinha, aeronáutica, polícia militar ou corpo de bombeiros'),
(4, 'Empregado sem carteira de trabalho assinada'),
(5, 'Conta própria'),
(6, 'Empregador'),
(7, 'Não remunerado'),
(8, 'Estagiário/Aprendiz'),
(9, 'Aposentado'),
(10, 'Auxílio doença INSS'),
(11, 'Sem vínculo empregatício');

