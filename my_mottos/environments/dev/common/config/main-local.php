<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=my_motto',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => FALSE,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.qq.com', #163 SMTP邮件服务器
                'username' => '769245396@qq.com', #邮箱
                'password' => 'kerarqhyvzhdbdha', #163服务器，请设置安全密码
                'port' => '465', #465/587/25
                'encryption' => 'ssl', #采用ssl加密方式
            ],
        ],
    ],
];
