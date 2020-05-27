<?php

declare(strict_types=1);

namespace Gingdev;

use InvalidArgumentException;

class Chatfuel
{
    const INVALID_URL = 'Error: Invalid URL!';

    /** @var array $response */
    protected $response = [];

    /**
     * Send Text
     *
     * @param string|array $messages
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
     * @param string $url
     * @return $this
     */
    public function sendImage(string $url)
    {
        if (isURL($url)) {
            $this->sendAttachment('image', ['url' => $url]);
        } else {
            $this->sendText(self::INVALID_URL);
        }
        return $this;
    }

    /**
     * Send Audio
     *
     * @param string $url
     * @return $this
     */
    public function sendAudio(string $url)
    {
       if (isURL($url)) {
           $this->sendAttachment('audio', ['url' => $url]);
       } else {
           $this->sendText(self::INVALID_URL);
       }
    }

    /**
     * Send Attachment
     *
     * @param string $type
     * @param array $payload
     * return $this
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
     * @param string $url
     * @return boolean
     */
    protected function isURL(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }
}
