# Yii2 Recaptcha Widget

A simple widget for integrating Google reCAPTCHA into Yii2 projects.

## Installation

```bash
composer require sknny/yii2-recaptcha-widget
```

1. Add the component to your configuration:

    ```php
    'components' => [
        'recaptcha' => [
            'class' => 'app\\components\\Recaptcha',
            'siteKey' => 'siteKey',
            'secretKey' => 'secretKey',
        ],
    ],
    ```

2. Use the widget in your view:

    ```php
    <?= app\widgets\RecaptchaWidget::widget(); ?>
    ```