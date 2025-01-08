<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class RecaptchaWidget extends Widget
{
    public $siteKey;

    public function init()
    {
        parent::init();
        if ($this->siteKey === null) {
            $this->siteKey = Yii::$app->recaptcha->siteKey ?? null;
        }

        if ($this->siteKey === null) {
            throw new \Exception('Site key is missing. Set it in config or pass to widget');
        }
    }

    public function run()
    {
        $this->view->registerJsFile('https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit', [
            'position' => \yii\web\View::POS_HEAD,
            'async' => true,
            'defer' => true
        ]);

        return Html::tag('div', '', [
            'class' => 'g-recaptcha',
            'data-sitekey' => $this->siteKey,
        ]);
    }
}