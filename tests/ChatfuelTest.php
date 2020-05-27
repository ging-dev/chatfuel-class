<?php

declare(strict_types=1);

namespace Gingdev\Chatfuel;

use Gingdev\Chatfuel;
use PHPUnit\Framework\TestCase;

class ChatfuelTest extends TestCase
{
    public function sendText()
    {
        $chatfuel = new Chatfuel();
        $chatfuel->sendText('Test');
        $test = [
            'messages' => [
                'text' => 'Test'
            ]
        ];
        $this->assertSame($chatfuel->toArray(), $test);
    }
}
