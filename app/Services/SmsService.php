<?php

namespace App\Services;

use GuzzleHttp\Client;

class SmsService
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = 'https://smsc.ru/sys/send.php';
    }

    public function sendSms($phoneNumber, $message)
    {
        $client = new Client();

        $queryParams = [
            'login' => 'rdbx',
            'psw' => 'ea1c2o1m',
            'phones' => $phoneNumber,
            'mes' => $message,
            'charset' => 'utf-8',
        ];

        try {
            $response = $client->get($this->apiUrl, ['query' => $queryParams]);
            $statusCode = $response->getStatusCode();

            if ($statusCode === 200) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
    }
}
