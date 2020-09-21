Por convenção todos os arquivos de teste devem terminar com Test

Os metodos devem começar com test nome do teste,
podem ser tanto camel case quanto snake case.

O metodo correto para se usar o phpunit instalado na maquina(não via composer) é:
phpunit --bootstrap=vendor/autoload.php pastaTeste/ArquivoTeste.php


**declare(strict_types = 1); **
declara tipagem no php nao aceitando valores diferentes do esperado.

Uma resposta mais completa precisa do adicional --verbose na hora de executar o teste.

