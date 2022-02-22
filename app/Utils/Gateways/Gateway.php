<?php

namespace App\Utils\Gateways;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

abstract class Gateway
{
    public $merchantId;
    protected $http;
    public $amount;

    abstract public function getBaseUri() :string;
    abstract public function getPurchaseUri() :string;
    abstract public function getRedirection() :string;
    abstract public function verify($amount, $authority);
    abstract protected function getMerchantId() :string;
    
    public function __construct()
    {
        $this->http = new Client(['http_errors' => false]);
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function httpRequest($method, $url, $config = [])
    {
        $result = $this->httpClient()->request($method, $url, $config);

        return [
            'status' => $result->getStatusCode(),
            'body' => $result->getBody()->getContents(),
            'headers' => $result->getHeaders()
        ];
    }

    public function redirectUrl($driver)
    {
        return route('payment.verify', ['driver' => $driver]);
    }

    protected function httpClient()
    {
        return $this->http;
    }
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }
}
