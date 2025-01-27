<?php

namespace App\Utils\Gateways;

class Zarinpal extends Gateway
{
    protected $authority;
    public $sandbox = false;
    public $description = "";
    public $metadata = [];
    public function __construct()
    {
        parent::__construct();
        if (config('services.zarinpal.sandbox')) {
            $this->sandbox();
            $this->setMerchantId('00000000-0000-0000-0000-000000000000');
        } else {
            $this->setMerchantId(config('services.zarinpal.merchant_id'));
        }
    }
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
                    'gateway' => $this->getRedirection(),
                    'transaction_id' => $this->authority
                ];
            }
            return ['okay' => false];
        }
        $data = $body['data'];
        if (isset($data->code) && $data->code === 100 && $data->authority) {
            $this->authority = $data->authority;
            return [
                'okay' => true,
                'gateway' => $this->getRedirection(),
                'transaction_id' => $this->authority
            ];
        }
        return [
            'okay' => false,
            'errors' => $body['errors']
        ];
    }
    /**
     * Verifiying the returned transaction
     */
    public function verify($amount, $authority)
    {
        $this->amount = $amount;
        $this->authority = $authority;
        $result = $this->requestVerify();
        $body = $result['body'];
        if ($this->isSandbox()) {
            [$status, $ref_id] = [$body['Status'], $body['RefID']];
            if (in_array($status, [100, 101]) && $ref_id) {
                return [
                    'okay' => true,
                    'ref_id' => $ref_id
                ];
            }
        }
        $data = $body['data'];
        if (isset($data->code) && ($data->code === 100 || $data->code === 101) && $data->ref_id) {
            return [
                'okay' => true,
                'ref_id' => $data->ref_id,
                'card_pan' => $data->card_pan ?? null
            ];
        }
        return [
            'okay' => false,
            'errors' => $body['errors'] ?? []
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
                    'metadata' => $this->metadata,
                    'currency' => 'IRT'
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
        $append = $this->isSandbox() ? 'PaymentRequest.json' : 'request.json';
        return $this->getBaseUri() . $append;
    }

    public function getVerifyUri(): string
    {
        $append = $this->isSandbox() ? 'PaymentVerification.json' : 'verify.json';
        return $this->getBaseUri() . $append;
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