<?php

declare(strict_types=1);

namespace Gingdev;

use Gingdev\Chatfuel;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

class ChatfuelTest extends TestCase
{
    public function testChatfuel(): void
    {
        /** @var Chatfuel */
        $chatfuel = new Chatfuel();
        $chatfuel->sendText('Test message');
        $this->assertSame($chatfuel->getResponse(), [
            'messages' => [
                ['text' => 'Test message']
            ]
        ]);
        $chatfuel
            ->sendText(['Hello', 'Hi'])
            ->sendText(true)
            ->sendImage('http://localhost/image.png')
            ->sendAudio('http://localhost/audio.mp3')
            ->sendVideo('http://localhost/video.mp4')
            ->sendFile('http://localhost/file.zip')
            ->sendImage('Invaild')
            ->sendAudio('Invaild')
            ->sendVideo('Invaild')
            ->sendFile('Invaild');
    }
}
