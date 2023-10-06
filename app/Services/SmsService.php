<?php

namespace App\Services;

use GuzzleHttp\Client;

class SmsService
{
    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = 'https://smsc.ru/sys/send.php';
    }

    public function sendSms($phoneNumber, $message)
    {
        $client = new Client();

        $queryParams = [
            'login' => 'rdbx', // Ваш API-ключ
            'psw' => 'ea1c2o1m', // Ваш пароль, если необходим
            'phones' => $phoneNumber, // Номер телефона получателя
            'mes' => $message, // Текст сообщения
            'charset' => 'utf-8', // Кодировка текста сообщения
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
