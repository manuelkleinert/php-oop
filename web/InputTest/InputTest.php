<?php
require '../vendor/autoload.php';
require 'Input.php';

use PHPUnit\Framework\TestCase;

class InputTest extends TestCase
{
    public function testCanLoadFromGlobals()
    {
        $_GET['foo'] = 'Hello';

        $input = Input::createFromGlobals();

        $this->assertEquals($_GET['foo'], $input->get('foo'));
        $this->assertNull($input->get('bar'));
    }

    public function testCanReplaceInputValues()
    {
        $newInputs = [
            'get' => ['foo' => 'Hello'],
            'post' => ['bar' => 'World']
        ];

        $input = new Input();

        $input->replace($newInputs);

        $this->assertEquals($newInputs['get']['foo'], $input->get('foo'));
        $this->assertEquals($newInputs['post']['bar'], $input->get('bar'));
    }
}

$test = new InputTest();
$test->testCanReplaceInputValues();
?>