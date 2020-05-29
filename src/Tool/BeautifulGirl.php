<?php

declare(strict_types=1);

namespace Gingdev\Tool;

use Curl\Curl;

class BeautifulGirl
{
    /** @var array $result */
    public $result = [];

    /**
     * Get all images
     *
     * @return boolean
     */
    public function get(): bool
    {
        $curl = new Curl();
        $curl->get('https://toithemgai.com/category/gallery/page/' . rand(1, 45) . '/');
        preg_match_all('#(?<=img src=").+?(?=")#', $curl->response, $result);
        $curl->close();
        if (count($result[0])) {
            $this->result = $result[0];
            return true;
        }
        return false;
    }
}
