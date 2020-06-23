<?php


namespace App\Service;


class PushAll
{
    private $privateKey = '';
    private $channelId = '';

    public function __construct(string $channelId, string $privateKey)
    {
        $this->privateKey = $privateKey;
        $this->channelId = $channelId;
    }

    public function notify(string $subject, string $message)
    {
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://pushall.ru/api.php',
            CURLOPT_POSTFIELDS => [
                "type" => 'broadcast',
                "id" => $this->channelId,
                "key" => $this->privateKey,
                "text" => $message,
                "title" => $subject,
            ],
            CURLOPT_SAFE_UPLOAD => true,
            CURLOPT_RETURNTRANSFER => true
        ]);

        $result = curl_exec($ch); //получить данные о рассылке
        curl_close($ch);

        return $result;
    }
}
