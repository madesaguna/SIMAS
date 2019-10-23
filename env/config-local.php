<?php

$db = require __DIR__ . '/db.php';

return [
    'aliases' => [
        '@reposroot' => '@app/web/repositori',
        '@imgroot' => '@reposroot/images',
        '@userprofileroot' => '@imgroot/users',
        '@inboxroot' => '@reposroot/SuratMasuk',
        '@outboxroot' => '@reposroot/SuratKeluar',
        '@instansiroot' => '@imgroot/instansi',
        /* web */
        '@frontWeb' => '', // path where app was installed (eq. http://localhost/simas)
        '@imageurl' => '@frontWeb/repositori/images',
        '@inboxurl' => '@frontWeb/repositori/SuratMasuk',
        '@outboxurl' => '@frontWeb/repositori/SuratKeluar',
        '@userprofileurl' => '@imageurl/users',
        '@instansiurl' => '@imageurl/instansi',
    ],
    'components' => [
        'db' => $db,
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
