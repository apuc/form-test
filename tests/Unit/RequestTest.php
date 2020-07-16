<?php

namespace Tests\Unit;


use App\Requests\RequestRequest;
use PHPUnit\Framework\TestCase;

/**
 * Class RequestTest
 * @package Tests\Unit
 */
class RequestTest extends TestCase
{
    private $request;

    /**
     * @dataProvider requestProvider
     */
    public function testValidate($arr, $expected)
    {
        $this->request->data['city'] = $arr['city'];
        $this->request->data['name'] = $arr['name'];
        $this->request->data['email'] = $arr['email'];
        $this->request->data['request'] = $arr['request'];
        $this->assertEquals($expected, $this->request->validate());
    }

    /**
     * @return array
     */
    public function requestProvider(): array
    {
        return [
            [['city' => 'Moscow', 'name' => 'Some Name', 'email' => 'asd123@gmail.com', 'request' => 'SomeTEXT'], true],
            [['city' => '', 'name' => 'Some Name', 'email' => 'some@email.com', 'request' => 'SomeTEXT'], false],
            [['city' => 'Moscow', 'name' => '', 'email' => 'some@email.com', 'request' => 'SomeTEXT'], false],
            [['city' => 'Moscow', 'name' => 'Some Name', 'email' => '', 'request' => 'SomeTEXT'], false],
            [['city' => 'Moscow', 'name' => 'Some Name', 'email' => 'some@email.com', 'request' => ''], false],
            [['city' => 'Moscow', 'name' => 'Some Name', 'email' => 'some@email.', 'request' => ''], false],
            [['city' => 'Moscow', 'name' => 'Some Name', 'email' => 'some@.', 'request' => ''], false],
            [['city' => 'Moscow', 'name' => 'SomeTEXTSomeTEXTSomeTEXTSomeTEXT', 'email' => 'some@email.com', 'request' => 'SomeTEXT'], false]
        ];
    }


    protected function setUp(): void
    {
        $this->request = new RequestRequest();
    }

    protected function tearDown(): void
    {
        $this->request = null;
    }
}