<?php

declare(strict_types=1);

namespace Gingdev\Tool;

use Curl\Curl;

class Girl
{
	/**
	 * @var Curl
	 */
	private $curl;

	/**
	 * @var int
	 */
	private $total;

	public function __construct()
	{
		$this->curl = new Curl();
		$this->curl->get('https://api.bumgada.com/api/v1/medias?limit=1');
		$this->total = json_decode($this->curl->response, true)['data']['total'];
	}

	/**
	 * Get random one record
	 * @return string
	 */
	public function getOne(): string
	{
		$this->curl->get('https://api.bumgada.com/api/v1/medias?limit=1&page=' . rand(1, $this->total));
		return json_decode($this->curl->response, true)['data']['medias'][0]['h'];
	}
}
