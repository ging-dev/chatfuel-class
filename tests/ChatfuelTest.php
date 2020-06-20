<?php

declare(strict_types=1);

namespace Gingdev;

use Gingdev\Chatfuel;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

class ChatfuelTest extends TestCase
{
    private $chatfuel;

    protected function setUp(): void
    {
        $this->chatfuel = new Chatfuel();
    }

    public function testSendText(): void
    {
        $chatfuel = new Chatfuel();
        $chatfuel->sendText('Test message');

        $this->assertSame($chatfuel->toArray(), [
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
            ->sendFile('Invaild')
            ->toJson();
    }

    public function testException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->chatfuel->sendText(null);
    }

    protected function tearDown(): void
    {
        $this->chatfuel = null;
    }
}
