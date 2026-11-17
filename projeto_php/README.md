# Venda de Veículos

Projeto individual da unidade curricular Aplicações Centradas em Redes (ACR).
Aplicação web em Laravel para consulta e gestão de anúncios de veículos.

## Plano de implementação

1. Base Laravel e modelos relacionados (`Categoria` e `Veiculo`).
2. Área pública: catálogo, pesquisa, ordenação, detalhes e destaque aleatório.
3. Autenticação, permissões e CRUD reservado.
4. Contactos, acabamento responsivo e configuração de deploy.

## Tecnologias

- Laravel 12 e PHP 8.2+
- MySQL
- Blade

## Modelo inicial

Uma categoria (carros, motas ou comerciais) pode conter vários veículos. Cada veículo pertence a uma categoria. O modelo `Veiculo` guardará os dados do anúncio e o URL de uma imagem.

## Execução

É necessário PHP 8.2+, Composer e uma base de dados MySQL. A configuração detalhada será completada nas próximas etapas.
