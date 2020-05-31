<?php

declare(strict_types=1);

namespace Gingdev\Tool;

use Curl\Curl;
use DOMWrap\Document;

class Xiuren
{
    /** @var array $result */
    public $response = [];

    /**
     * Get all images
     *
     * @return void
     */
    public function get(): void
    {
        $curl = new Curl();
        $curl->setUserAgent('');
        $curl->get('http://www.xiuren.org/page-' . rand(1, 353) . '.html');
        $html = $curl->response;
        $curl->close();
        $doc = (new Document())->html($html);
        $main = $doc->find('#main')[0];
        $images = $main->find('img');
        foreach ($images as $image) {
            $this->response[] = substr($image->attr('src'), 36);
        }
    }

    /**
     * Get random image
     *
     * @return string
     */
    public function random(): string
    {
        if (! empty($this->response)) {
            return (string) $this->response[rand(0, count($this->response) - 1)];
        } else {
            return 'No image to show.';
        }
    }
}
