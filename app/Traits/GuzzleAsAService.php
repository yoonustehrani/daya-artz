<?php

namespace App\Traits;

trait GuzzleAsAService
{
    public $client;
    public function postRequest($url, $config = []) {
        try {
            $request = $this->client->post($url, $config);
            [$status, $body] = [$request->getStatusCode(), $request->getBody()->getContents()];
            return [
                'status' => $status,
                'body' => $body,
                'json_body' => json_decode($body)
            ];
        } catch (\Exception $e) {
            return ['okay' => false, 'error' => $e->getMessage()];
        }
    }
}