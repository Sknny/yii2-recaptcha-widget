<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\httpclient\Client;

class Recaptcha extends Component
{
    public $siteKey;
    public $secretKey;

    public function validate($response)
    {
        $client = new Client();
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl($url)
            ->setData([
                'secret' => $this->secretKey,
                'response' => $response,
                'remoteip' => Yii::$app->request->userIP,
            ])
            ->send();

        return $response->isOk && $response->data['success'];
    }
}