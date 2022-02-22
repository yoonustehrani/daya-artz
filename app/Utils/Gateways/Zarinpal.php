<?php

namespace App\Utils\Gateways;

class Zarinpal extends Gateway
{
    protected $authority;
    public $sandbox = false;
    public $description = "";
    public $metadata = [];
    /**
     * Requesting a Zarinpal gateway
     * @param int $amount
     * @param string $description
     * @param array $metadata
     * @return array[boolean okay, errors ?array]
     */
    public function purchase(int $amount, string $description, array $metadata = [])
    {
        $this->amount = $amount;
        $this->description = $description;
        $this->metadata = $metadata;
        $result = $this->requestPayment();
        $body = $result['body'];
        if ($this->isSandbox()) {
            if ($body['Status'] === 100 && isset($body['Authority'])) {
                $this->authority = $body['Authority'];
                return [
                    'okay' => true,
                    'gateway' => $this->getRedirection()
                ];
            } else {
                return [
                    'okay' => false
                ];
            }
        }
        $data = $body['data'];
        if (isset($data['code']) && $data['code'] === 100 && $data['authority']) {
            $this->authority = $data['authority'];
            return [
                'okay' => true,
                'gateway' => $this->getRedirection()
            ];
        }
        return [
            'okay' => false,
            'errors' => $body['errors']
        ];
    }
    public function verify($amount, $authority)
    {
        $this->amount = $amount;
        $this->authority = $authority;
        $result = $this->requestVerify();
        $body = $result['body'];
        $data = $body['data'];
        if (isset($data['code']) && ($data === 100 || $data === 101) && $data['ref_id']) {
            return [
                'okay' => true,
                'ref' => $data['ref_id'],
                'meta' => [
                    'card_pan' => $data['card_pan'],
                    'fee' => $data['fee']
                ]
            ];
        }
        return [
            'okay' => false,
            'errors' => $body['errors']
        ];
    }
    public function requestPayment()
    {
        $url = $this->getPurchaseUri();
        $response = $this->httpRequest('POST', $url, $this->prepareRequestParamsForPurchase());
        $response['body'] = (array) json_decode($response['body']);
        return $response;
    }
    public function requestVerify()
    {
        $url = $this->getVerifyUri();
        $response = $this->httpRequest('POST', $url, $this->prepareRequestParamsForVerification());
        $response['body'] = (array) json_decode($response['body']);
        return $response;
    }
    /**
     * Preparing json data to send to Zarinpal Server
     * @return array
     */
    public function prepareRequestParamsForVerification()
    {
        $json = $this->isSandbox() ?
        [
            'MerchantID' => $this->getMerchantId(),
            'Amount' => $this->getAmount(),
            'Authority' => $this->authority
        ] : 
        [
            'merchant_id' => $this->getMerchantId(),
            'amount' => $this->getAmount(),
            'authority' => $this->authority
        ];
        return compact('json');
    }
    /**
     * Preparing json data to send to Zarinpal Server
     * @return array
     */
    public function prepareRequestParamsForPurchase()
    {
        $json = $this->isSandbox() ?
                [
                    'MerchantID' => $this->getMerchantId(),
                    'Amount' => $this->getAmount(),
                    'Description' => $this->description,
                    'CallbackURL' => $this->redirectUrl('zarinpal'),
                ] : 
                [
                    'merchant_id' => $this->getMerchantId(),
                    'amount' => $this->getAmount(),
                    'description' => $this->description,
                    'callback_url' => $this->redirectUrl('zarinpal'),
                    'metadata' => $this->metadata
                ];
        return compact('json');
    }
    public function getBaseUri(): string
    {
        if ($this->isSandbox()) {
            return 'https://sandbox.zarinpal.com/pg/rest/WebGate/';
        }
        return "https://api.zarinpal.com/pg/v4/payment/";
    }
    
    public function getPurchaseUri(): string
    {
        $url = $this->getBaseUri();
        $url .= $this->isSandbox() ? 'PaymentRequest.json' : 'request.json';
        return $url;
    }

    public function getVerifyUri(): string
    {
        $url = $this->getBaseUri();
        $url .= $this->isSandbox() ? 'PaymentVerification.json' : 'verify.json';
        return $url;
    }

    public function getRedirection(): string
    {
        $method = $this->isSandbox() ? 'sandbox' : 'www';
        return "https://{$method}.zarinpal.com/pg/StartPay/{$this->authority}";
    }
    protected function getMerchantId(): string
    {
        return $this->isSandbox()
            ? '00000000-0000-0000-0000-000000000000'
            : $this->merchantId;
    }
    public function sandbox()
    {
        $this->sandbox = true;
        return $this;
    }
    public function isSandbox()
    {
        return $this->sandbox;
    }
}

