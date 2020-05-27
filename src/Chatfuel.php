<?php

declare(strict_types=1);

namespace Gingdev;

use InvalidArgumentException;

class Chatfuel
{
    /** @var array $response */
    protected $response = [];
    
    /**
     * Add text-message to response
     *
     * @param string|array $message
     * @return $this
     */
    public function sendText($messages)
    {
        if (empty($messages)) {
            throw new InvalidArgumentException('Input must not empty.');
        }
        switch (gettype($messages)) {
            case 'string':
                $this->response[] = [
                    'text' => $messages
                ];
                break;
            case 'array':
                foreach ($messages as $message) {
                    $this->response[] = [
                        'text' => $message
                    ];
                }
                break;
            default:
                $this->response[] = [
                    'text' => 'Error!'
                ];
                break;
        }
    }
}
