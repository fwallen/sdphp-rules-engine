<?php

class RulesEngineTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function it_can_instantiate_the_rules_engine()
    {
        $engine = new \PhpArch\RulesEngine\Engine();
        $this->assertInstanceOf(\PhpArch\RulesEngine\Engine::class, $engine);
    }
}