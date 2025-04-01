# Tutorial: PHP_CodeSniffer (PHPCS)

**Autores: Jean Carlos Nesi e Kauã Librelato da Costa**

## GitHub Actions

[![Build and Tests](https://github.com/JeanNesi/phpcs/actions/workflows/phpcs.yml/badge.svg?branch=main)](https://github.com/JeanNesi/phpcs/actions/workflows/phpcs.yml)

## O que é o PHP_CodeSniffer?

O PHP_CodeSniffer (PHPCS) é uma ferramenta para análise estática e formatação automática de código PHP. Ele verifica se seu código segue padrões de codificação (como PSR-12) e corrige automaticamente diversos problemas, melhorando a legibilidade, manutenção e qualidade geral do código.

## Principais Funcionalidades

- Verificação com base em guias como PSR-12, PSR-2, WordPress, Symfony
- Suporte a regras personalizadas
- Ferramenta de correção automática: PHP Code Beautifier (phpcbf)
- Integração com editores (VS Code, PHPStorm) e pipelines CI/CD

## Instalação

### Usando o Composer (Recomendado)

#### Instalação local:
```sh
composer require --dev squizlabs/php_codesniffer
```

#### Instalação global:
```sh
composer global require squizlabs/php_codesniffer
```

### Verificando a instalação:
```sh
phpcs --version
```

### Alternativa: Clonando o repositório
```sh
git clone https://github.com/squizlabs/PHP_CodeSniffer.git
cd PHP_CodeSniffer
composer install
```

## Configuração Básica

### Listar padrões disponíveis:
```sh
phpcs -i
```

### Definir padrão PSR-12:
```sh
phpcs --config-set default_standard PSR12
```

### Verificar um arquivo:
```sh
phpcs caminho/do/arquivo.php
```

### Correção automática:
```sh
phpcbf caminho/do/arquivo.php
```

## Arquivo de Configuração Personalizado

Crie um arquivo `phpcs.xml` com o seguinte conteúdo:

```xml
<?xml version="1.0"?>
<ruleset name="MeuPHPCSConfig">
    <description>Configuração personalizada para o PHP_CodeSniffer</description>

    <!-- Inclui padrões do PSR12 -->
    <rule ref="PSR12"/>

    <!-- Aspas simples -->
    <rule ref="Squiz.Strings.DoubleQuoteUsage.NotRequired"/>

    <!-- Espaçamento e indentação -->
    <rule ref="Squiz.WhiteSpace.SuperfluousWhitespace"/>
    <rule ref="Generic.WhiteSpace.DisallowTabIndent"/>
    <rule ref="Generic.WhiteSpace.ScopeIndent"/>

    <!-- Outras boas práticas -->
    <rule ref="Generic.Formatting.DisallowMultipleStatements"/>
    <rule ref="Squiz.PHP.NonExecutableCode"/>
    <rule ref="Squiz.Functions.MultiLineFunctionDeclaration"/>
    <rule ref="Generic.ControlStructures.InlineControlStructure"/>

    <!-- Arquivos a serem analisados -->
    <arg name="extensions" value="php"/>

    <!-- Número de espaços por indentação -->
    <arg name="tab-width" value="4"/>
</ruleset>
```

Depois disso, basta rodar:
```sh
phpcs .
```

## Integração com o Ambiente de Desenvolvimento

### VS Code

1. Instale a extensão **PHP Intelephense** no marketplace.
2. Configure o `settings.json`:

```json
{
    "phpcs.executablePath": "/caminho/para/phpcs",
    "phpcs.standard": "PSR12"
}
```

### PHPStorm

Acesse: **Settings** > **Languages & Frameworks** > **PHP** > **Quality Tools** e configure o caminho do `phpcs`.

## Guias de Estilo Suportados

- PSR-12
- PSR-2
- WordPress
- Symfony

## Regras de Estilo Configuráveis

| Regra | Descrição | Nome da Regra |
| --- | --- | --- |
| Indentação | Espaços vs. Tabs | Generic.WhiteSpace.ScopeIndent / Generic.WhiteSpace.DisallowTabIndent |
| Comprimento da Linha | Limite de caracteres | Generic.Files.LineLength |
| Nomes de Variáveis | CamelCase, snake_case | Generic.NamingConventions.UpperCaseVariableName |
| Espaçamento | Em torno de operadores | Generic.WhiteSpace.OperatorSpacing |

## Exemplo Prático

### Antes (com problemas):
```php
<?php
function test(){echo "Hello, world!";}
```

### Depois (corrigido):
```php
<?php
function test()
{
    echo "Hello, world!";
}
```

## Conclusão

Utilizar o PHP_CodeSniffer garante padronização e qualidade no seu projeto, facilita revisões de código e reduz erros humanos. É uma ferramenta essencial para projetos PHP profissionais.
