Por convenção todos os arquivos de teste devem terminar com Test

Os metodos devem começar com test nome do teste,
podem ser tanto camel case quanto snake case.

O metodo correto para se usar o phpunit instalado na maquina(não via composer) é:
phpunit --bootstrap=vendor/autoload.php pastaTeste/ArquivoTeste.php


**declare(strict_types = 1); **
declara tipagem no php nao aceitando valores diferentes do esperado.

Uma resposta mais completa precisa do adicional --verbose na hora de executar o teste.

doc para adicionar dependencias nos metodos de teste
/**
* @depends nomeMetodoTeste
*/

doc para avisar que pode esperar exceções ou erros
/**
* @expectedException \Exception 
*/

doc para avisar de mensagem esperada na exception
/**
* @expectedExceptionMessage *Mensagem colocada na exception*
*/

se precisar fazer alguma configuração global para toda a classe de teste. fazer dentro do:
public static setUpBeforeClass()

Se precisar fazer uma configuração para ser acionada antes de cada metodo de teste fazer dentro do:
protected function setUp()

se precisa desconstruir algo a cada teste. fazer dentro de
protected function tearDown()

para destruir todo o ambiente após o teste usar o tearDownAdterClass()
