<?php

declare(strict_types=1);

namespace Gingdev;

class Chatfuel
{
    /** @var array */
    protected $response = [];

    /**
     * Send Text
     *
     * @param  string|array $messages
     * @return $this
     */
    public function sendText($messages)
    {
        switch (gettype($messages)) {
            case 'string':
                $this->response[] = ['text' => $messages];
                break;
            case 'array':
                foreach ($messages as $message) {
                    $this->response[] = ['text' => $message];
                }
                break;
            default:
                $this->response[] = ['text' => 'Error: Input must be string or array.'];
                break;
        }
        return $this;
    }

    /**
     * Send Image
     *
     * @param  string $url
     * @return $this
     */
    public function sendImage(string $url)
    {
        $this->sendURL($url, 'image');
        return $this;
    }

    /**
     * Send Audio
     *
     * @param  string $url
     * @return $this
     */
    public function sendAudio(string $url)
    {
        $this->sendURL($url, 'audio');
        return $this;
    }

    /**
     * Send Video
     *
     * @param  string $url
     * @return $this
     */
    public function sendVideo(string $url)
    {
        $this->sendURL($url, 'video');
        return $this;
    }

    /**
     * Send File
     *
     * @param  string $url
     * @return $this
     */
    public function sendFile(string $url)
    {
        $this->sendURL($url, 'file');
        return $this;
    }

    /**
     * Get Response
     *
     * @return array
     */
    public function getResponse(): array
    {
        return ['messages' => $this->response];
    }

    /**
     * Send Attachment
     *
     * @param  string $type
     * @param  array $payload
     * @return $this
     */
    protected function sendAttachment(string $type, array $payload)
    {
        $this->response[] = [
            'attachment' => [
                'type'    => $type,
                'payload' => $payload
            ]
        ];
        return $this;
    }

    /**
     * Send Link
     *
     * @param  string $url
     * @param  string $type
     * @return void
     */
    protected function sendURL(string $url, string $type): void
    {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $this->sendAttachment($type, ['url' => $url]);
        } else {
            $this->sendText('Error: Invalid URL!');
        }
    }
}
