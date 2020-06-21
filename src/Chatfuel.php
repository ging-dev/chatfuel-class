<?php

declare(strict_types=1);

namespace Gingdev;

use InvalidArgumentException;

class Chatfuel
{
    const INVALID_URL = 'Error: Invalid URL!';

    /**
     * Response variable
     * @var array
     */
    protected $response = [];

    /**
     * Send Text
     *
     * @param  string|array $messages
     * @return $this
     */
    public function sendText($messages)
    {
        if (empty($messages)) {
            throw new InvalidArgumentException('Input must not empty.');
        }
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
                $this->response[] = ['text' => 'Error!'];
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
        if ($this->isURL($url)) {
            $this->sendAttachment('image', ['url' => $url]);
        } else {
            $this->sendText(self::INVALID_URL);
        }
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
        if ($this->isURL($url)) {
            $this->sendAttachment('audio', ['url' => $url]);
        } else {
            $this->sendText(self::INVALID_URL);
        }
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
        if ($this->isURL($url)) {
            $this->sendAttachment('video', ['url' => $url]);
        } else {
            $this->sendText(self::INVALID_URL);
        }
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
        if ($this->isURL($url)) {
            $this->sendAttachment('file', ['url' => $url]);
        } else {
            $this->sendText(self::INVALID_URL);
        }
        return $this;
    }

    /**
     * To Json
     *
     * @param  bool
     * @return string
     */
    public function toJson(bool $debug = false): string
    {
        $message = ['messages' => $this->response];
        if ($debug) {
            return json_decode($message, JSON_PRETTY_PRINT);
        }
        return json_encode($message);
    }

    /**
     * To Array
     *
     * @return array
     */
    public function toArray(): array
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
     * Check the valid URL
     *
     * @param  string $url
     * @return boolean
     */
    protected function isURL(string $url)
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }
}
