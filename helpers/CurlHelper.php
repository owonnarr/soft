<?php
/**
 * Created by PhpStorm.
 * User: owonnarr
 * Date: 06.05.19
 * Time: 17:08
 */

namespace app\helpers;

use yii\helpers\Json;
use Yii;

class CurlHelper
{
    private $host;
    private $data;

    public function __construct(string $host, array $data)
    {
        $this->host = $host;
        $this->data = Json::encode($data);
    }

    /**
     * send cURL pose request
     * @return mixed
     */
    public function sendPost()
    {
        $ch = curl_init(); //инициализация сеанса
        curl_setopt($ch, CURLOPT_URL, $this->host); //урл сайта к которому обращаемся
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POST, 1); //передача данных методом POST
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //теперь curl вернет нам ответ, а не выведет
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->data);
        curl_setopt($ch, CURLOPT_USERAGENT, 'MSIE 5'); //эта строчка как-бы говорит: "я не скрипт, я IE5" :)

        $response = curl_exec($ch);
        $response = json_decode($response);

        $info = curl_getinfo($ch);

        if (is_array($info) && $info['http_code'] !== 200) {
            Yii::warning('Код ответа - '.$info['http_code'], 'curl');
        }

        curl_close($ch);

        if (!$response->feedbackDataId) {
            throw new \DomainException('Error. Field feedbackDataId not found');
        }
        return $response->feedbackDataId;
    }
}